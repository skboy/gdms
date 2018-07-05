<?php

namespace app\student\controller;

use think\Db;
use think\Validate;

class Message extends Common
{
    //留言列表
    public function message_list()
    {
        $message_list = Db::name('message')->where(['student_id' => $this->student_id])->order('create_time desc')->paginate(5);//查询留言 每页5条记录
        $count = Db::name('Article')->where(['student_id' => $this->student_id])->count();//查询该学生有没选择论文
        if ($count == 0) {//如果没选择论文则不能留言
            $this->error('你还没选题,不能留言', '/student/article_list');
        }
        //输出变量
        $page = $message_list->render();
        $this->assign('page', $page);
        $this->assign('message_list', $message_list);
        return $this->fetch();
    }

    //添加留言
    public function add_message()
    {
        //POST提交
        if (IS_POST) {
            $content = $this->request->param('content');//获取留言内容
            $teacher_id = Db::name('Article')->where(['student_id' => $this->student_id])->value(['teacher_id']);//查询论文老师ID
            if (!$teacher_id) {//如果不存在老师id
                $this->error('你还没选题,不能留言');
            }
            //组装插入留言的数据
            $data = [
                'content' => $content,//留言
                'create_time' => time(),//时间戳
                'student_id' => $this->student_id,//学生ID
                'teacher_id' =>$teacher_id,//老师id
                'student_name' =>session('student')['name'],//学生名字
                'type' => 1,//1表示学生留言
            ];

            $res = Db::name('message')->insertGetId($data);//插入数据
       //     Db::name('message_read')->insert(['message_id' => $res,'teacher_id'=>$teacher_id]);
            if ($res) {
                $this->success('留言成功');
            } else {
                $this->error('留言失败');
            }
        }
    }
}

