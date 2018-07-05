<?php

namespace app\student\controller;

use think\Db;

class Index extends Common
{
    //首页 公告
    public function index()
    {
        $teacher_id = Db::name('article')->where(['student_id' => $this->student_id])->value('teacher_id');//查询指导老师ID
        $teacher=Db::name('user')->find($teacher_id);//查找指导老师
        $notice_list = Db::name('notice')->where(['user_id' => $teacher_id])->order('update_time desc')->paginate(10);//按更新顺序查找公告 每页10条记录

        //输出变量
        $this->assign('notice_list', $notice_list);
        $this->assign('teacher', $teacher);
        $page = $notice_list->render();
        $this->assign('page', $page);
        return $this->fetch();
    }

    //公告详情
    public function notice_detail(){

        $notice_id = $this->request->param('notice_id');//公告id
        $notice = Db::name('notice')->find($notice_id);//查找公告详情

        //输出变量
        $this->assign('notice', $notice);;
        return $this->fetch('detail');
    }

    //上传头像
    public function upload()
    {

        $file = request()->file('avatar_file');//获取上传的头像


        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');  // 移动到框架应用根目录/public/uploads/ 目录下

            $avatar = '\\uploads\\'.$info->getsaveName();//获取上传后的头像名字

            $res = Db::name('user')->where(['user_id' => $this->student_id])->update(['avatar' => $avatar]);//更新user表
            $user=   session('student');//获取session里的student信息
            $user['avatar']=$avatar;
            session('student',$user);//更新session里的student信息
            if ($res !== false) {
                exit(json_encode(['status' => 1,'result'=>$avatar,'message'=>'上传成功']));
            }else{
                exit(json_encode(['status' => 0,'message'=>'上传失败']));
            }

        }
    }
}
