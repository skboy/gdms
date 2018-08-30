<?php

namespace app\student\controller;

use think\Validate;
use app\model\Article;
use app\model\Task;

class Schedule extends Common
{


    //进度列表
    public function task_list()
    {

        $article_id = Article::where(['student_id'=>$this->student_id])->value('article_id');
        if (!$article_id){
            $this->error('请先选题');
        }
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
        $task = $Task->find($task_id);//查询对应任务
        if (IS_POST) {
            $file = request()->file('student_file');//获取附件

            if ($file) {

                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');//上传附件
                if ($info) {
                    // 成功上传后 获取上传信息
                    $data['student_file'] = '\\uploads\\' . $info->getsaveName();//获取上传后的文件路径
                    $data['student_file_name'] = $info->getInfo()['name'];//获取上传后的文件名字
                } else {//上传失败
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
                if ($file && $task['student_file'] != '') {
                    unlink('../Public/' . $task['student_file']);

                }
                $data['update_time'] = time();
                $res = $Task->where(['task_id' => $task_id])->update($data);//插入数据
                if ($res) {
                    $this->success('操作成功');
                } else {
                    $this->error('操作失败');
                }
            }else{
                $this->error('学生附件不能为空');
            }
        }

        $article_id = $this->request->param('article_id', 0);//获取论文ID
        $article = Article::with('student')->find($article_id);
        $this->assign('article', $article);
        $this->assign('task', $task);
        return $this->fetch();
    }


}
