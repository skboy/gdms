<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;

class Index extends Common
{

    //首页 最新留言
    public function index()
    {
        $query = Db::name('message')->where(['teacher_id' => $this->teacher_id, 'type' => 1])->order('id desc')->buildSql();//查询该老师下学生的留言
        $message_list = Db::table($query . ' a')->group('student_id')->select();//排序分组刚查询的留言

        //输出
        $this->assign('message_list', $message_list);
        return $this->fetch();
    }


    //单个学生留言列表
    public function message_list()
    {
        $student_id = $this->request->param('student_id');//学生id
        $message_list = Db::name('message')->where(['student_id' => $student_id])->order('create_time desc')->paginate(5);//查询该学生留言列表 每页5条
        $page = $message_list->render();//渲染分页
        //输出变量
        $this->assign('page', $page);
        $this->assign('student_id', $student_id);
        $this->assign('message_list', $message_list);
        return $this->fetch();
    }


    //添加留言
    public function add_message()
    {
        //post提交
        if (IS_POST) {
            $content = $this->request->param('content');//内容
            $student_id = $this->request->param('student_id');//学生id

            $data = [
                'content' => $content,//内容
                'create_time' => time(),//时间戳
                'student_id' => $student_id,//学生id
                'teacher_id' => $this->teacher_id,//老师id
                'teacher_name' => session('teacher')['name'],//老师名字
                'type' => 0,//0表示老师回复
            ];

            $res = Db::name('message')->insertGetId($data);//插入数据
            //Db::name('message_read')->insert(['message_id' => $res, 'teacher_id' => $this->teacher_id]);
            if ($res) {
                $this->success('留言成功');
            } else {
                $this->error('留言失败');
            }
        }
    }

    //上传头像
    public function upload()
    {

        $file = request()->file('avatar_file');//获取上传的头像

        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'); // 移动到框架应用根目录/public/uploads/ 目录下


            $avatar = '\\uploads\\' . $info->getsaveName();//获取上传后的头像名字

            $res = Db::name('user')->where(['user_id' => $this->teacher_id])->update(['avatar' => $avatar]);//更新user表

            $user = session('teacher');//获取session里的teacher信息
            $user['avatar'] = $avatar;
            session('teacher', $user);//更新session里的teacher信息
            if ($res !== false) {
                exit(json_encode(['status' => 1, 'result' => $avatar, 'message' => '上传成功']));
            } else {
                exit(json_encode(['status' => 0, 'message' => '上传失败']));
            }

        }
    }
}
