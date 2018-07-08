<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;
use Illuminate\Http\Request;
use app\model\Article ;
use app\model\Task;
class Schedule extends Common
{
    public function schedule_list(){
        $Article=new Article();
        $where['teacher_id']=$this->teacher_id;
        $where['student_id']=['gt',0];

        $article_list = $Article->with('student')->where($where)->order('update_time desc')->select();//查询自己发布的论文 每页10条记录
        //输出变量
        $this->assign('article_list', $article_list);
        return $this->fetch();
    }
    public function task_list(){
       $article_id= $this->request->param('article_id');
        $Task=new Task();
        $data=$Task->with('article.student')->where(['article_id'=>$article_id])->select();
        $status=[
            '0'=>'未开始',
            '1'=>'执行中',
            '2'=>'已完成',
            '3'=>'待审核',
        ];
        $this->assign('article_id', $article_id);
        $this->assign('data', $data);
        $this->assign('status', $status);
        return $this->fetch();
    }

    //添加或修改任务
    public function add_edit()
    {
        $Task=new Task();
        $task_id = $this->request->param('task_id');//获取论文ID
        $article_id = $this->request->param('article_id');//获取论文ID
        $article = Article::with('student')->find($article_id);
        $this->assign('article', $article);

        if ($task_id) {
            $task = $Task->find($task_id);//查询对应论文
            $this->assign('task', $task);
        }

        if (IS_POST) {//POST提交

            $post = $this->request->post();//post数据
            //dd($post);
            //验证规则
            $rule = [
                'task_name|任务标题' => 'require',
                'description|任务描述' => 'require',
                'point|任务分数' => 'require|number',
                'start_time|开始时间' => 'require|date',
                'end_time|结束时间' => 'require|date',

            ];
            //验证返回错误信息
            $msg = [
                'task_name.require' => '任务标题不能为空',
                'description.require' => '任务描述不能为空',
                'point.require' => '任务分数不能为空',
                'point.number' => '任务分数只能为纯数字',
                'start_time.require' => '开始时间不能为空',
                'end_time.require' => '结束时间不能为空',
            ];
            $validate = new Validate($rule, $msg);//实例化验证器
            $result = $validate->check($post);//检查post数据
            if (!$result) {//如果不符合,则返回错误信息
                $this->error($validate->getError());
            }
            //如果article_id不为空,表示修改论文信息
            if (($post['task_id']) != '') {

                $data['task_name'] = $post['task_name'];//
                $data['description'] = $post['description'];//
                $data['update_time'] = time();
                $data['create_time'] = time();

                $url = '/teacher/task_list';
            } else {
                //新增论文

                $data['task_name'] = $post['task_name'];//
                $data['description'] = $post['description'];//
                $data['point'] = $post['point'];//
                $data['update_time'] = time();
                $data['create_time'] = time();
                $data['start_time'] =strtotime($post['start_time']);
                $data['end_time'] = strtotime($post['end_time']);
                $res = Db::name('Article')->insertGetId($data);//插入数据
                $url = '/teacher/add_edit';
            }
            if ($res) {
                $this->success('操作成功', $url);
            } else {
                $this->error('操作失败');
            }

        }
        $status=[
            '0'=>'未开始',
            '1'=>'执行中',
            '2'=>'已完成',
            '3'=>'待审核',
        ];

        $this->assign('status', $status);
        return $this->fetch();
    }

}
