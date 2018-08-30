<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;
use Illuminate\Http\Request;
use app\model\Article;
use app\model\Task;

class Schedule extends Common
{
    //老师点进度管理进来的页面
    public function schedule_list()
    {
        $Article = new Article();
        $where['teacher_id'] = $this->teacher_id;
        $where['student_id'] = ['gt', 0];

        $article_list = $Article->with('student')->where($where)->order('update_time desc')->select();//查询自己发布的论文 每页10条记录
        //输出变量
        $this->assign('article_list', $article_list);
        return $this->fetch();
    }

    //点击查看该学生后的任务列表页面
    public function task_list()
    {
        $article_id = $this->request->param('article_id');
        $Task = new Task();
        $data = $Task->with('article.student')->where(['article_id' => $article_id])->select();

        $this->assign('article_id', $article_id);
        $this->assign('data', $data);

        return $this->fetch();
    }

    //进度详情
    public function task_detail()
    {
        $Task = new Task();
        $task_id = $this->request->param('task_id', 0);//获取论文ID
        if (IS_POST) {
            $post = $this->request->post();//post数据
            //验证规则
            $rule = [
                'content|任务标题' => 'require',
                'r_point|任务分数' => 'require|number',


            ];
            //验证返回错误信息
            $msg = [
                'content.require' => '评语不能为空',
                'r_point.require' => '分数不能为空',
                'r_point.number' => '分数只能为纯数字',

            ];
            $validate = new Validate($rule, $msg);//实例化验证器
            $result = $validate->check($post);//检查post数据
            if (!$result) {//如果不符合,则返回错误信息
                $this->error($validate->getError());
            }
            $data['content'] = $post['content'];//
            $data['r_point'] = $post['r_point'];//
            $res = $Task->where(['task_id' => $post['task_id']])->update($data);//插入数据
            if ($res) {
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        }
        $task = $Task->find($task_id);//查询对应任务
        $article_id = $this->request->param('article_id', 0);//获取论文ID
        $article = Article::with('student')->find($article_id);
        $this->assign('article', $article);
        $this->assign('task', $task);
        return $this->fetch();
    }

    //添加全体任务
    public function task_add_all()
    {
        if (IS_POST) {//POST提交
            $where['teacher_id'] = $this->teacher_id;
            $where['student_id'] = ['gt', 0];
            $Article = new Article();
            $article_list = $Article->where($where)->order('update_time desc')->column('article_id');
            if (empty($article_list)) {
                $this->error('还未有学生选择您的题目,不能发布任务');
            }
            $post = $this->request->post();//post数据

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
            if (strtotime($post['start_time']) > strtotime($post['end_time'])) {
                $this->error('开始时间不能大于结束时间');
            }


            $file = request()->file('teacher_file');//获取附件

            if ($file) {

                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');//上传附件
                if ($info) {
                    // 成功上传后 获取上传信息
                    $teacher_file = '\\uploads\\' . $info->getsaveName();//获取上传后的文件路径
                    $teacher_file_name = $info->getInfo()['name'];//获取上传后的文件名字
                } else {//上传失败
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
            foreach ($article_list as $k => $v) {
                $data[$v]['article_id'] = $v;//
                $data[$v]['task_name'] = $post['task_name'];//
                $data[$v]['description'] = $post['description'];//
                $data[$v]['teacher_file'] = $teacher_file;//
                $data[$v]['teacher_file_name'] = $teacher_file_name;//
                $data[$v]['point'] = $post['point'];//
                $data[$v]['start_time'] = strtotime($post['start_time']);
                $data[$v]['end_time'] = strtotime($post['end_time']);
                $data[$v]['create_time'] = time();
            }
            $res = Task::insertAll($data);
            if ($res) {
                $this->success('操作成功', '/teacher/schedule');
            } else {
                $this->error('操作失败');
            }

        }
        return $this->fetch();
    }

    //添加或修改任务
    public function task_add_edit()
    {
        $Task = new Task();
        $task_id = $this->request->param('task_id', 0);//获取论文ID
        $article_id = $this->request->param('article_id', 0);//获取论文ID
        $article = Article::with('student')->find($article_id);
        $this->assign('article', $article);

        if ($task_id) {
            $task = $Task->find($task_id);//查询对应任务
            $this->assign('task', $task);
        }

        if (IS_POST) {//POST提交

            $post = $this->request->post();//post数据

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
            if (strtotime($post['start_time']) > strtotime($post['end_time'])) {
                $this->error('开始时间不能大于结束时间');
            }
            $file = request()->file('teacher_file');//获取附件

            if ($file) {

                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');//上传附件
                if ($info) {
                    // 成功上传后 获取上传信息
                    $data['teacher_file'] = '\\uploads\\' . $info->getsaveName();//获取上传后的文件路径
                    $data['teacher_file_name'] = $info->getInfo()['name'];//获取上传后的文件名字
                } else {//上传失败
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
            $data['task_name'] = $post['task_name'];//
            $data['description'] = $post['description'];//
            $data['point'] = $post['point'];//

            $data['start_time'] = strtotime($post['start_time']);
            $data['end_time'] = strtotime($post['end_time']);
            //如果article_id不为空,表示修改任务信息
            if (($post['task_id']) != 0) {
                if ($file && $task['teacher_file'] != '') {
                    unlink('../Public/' . $task['teacher_file']);

                }
                $data['update_time'] = time();
                $res = $Task->where(['task_id' => $post['task_id']])->update($data);//插入数据
                $url = '/teacher/task_list/article_id/' . $article_id;
            } else {
                //新增论文
                $data['article_id'] = $article_id;
                $data['create_time'] = time();
                $res = $Task->insertGetId($data);//插入数据
                $url = '/teacher/add_edit';
            }
            if ($res) {
                $this->success('操作成功', $url);
            } else {
                $this->error('操作失败');
            }

        }
        return $this->fetch();
    }

    //删除
    public function task_delete()
    {
        $Task = new Task();
        $task_id = $this->request->param('task_id', 0);//获取论文ID
        $article_id = $this->request->param('article_id', 0);//获取论文ID
        $task = $Task->find($task_id);//查询对应任务
        /* if ($task['teacher_file'] != '') {
             unlink('../Public/' . $task['teacher_file']);
         }*/
        $res = $task->delete();
        $url = '/teacher/task_list/article_id/' . $article_id;
        if ($res) {
            $this->success('操作成功', $url);
        } else {
            $this->error('操作失败');
        }
    }

}
