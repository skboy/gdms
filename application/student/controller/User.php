<?php

namespace app\student\controller;

use think\Db;

class User extends Common
{
    //设置页面
    public function setting()
    {

        $major = Db::name('major_department')->where(['parent_id' => 0])->select();//查找专业父类
        //输出变量
        $this->assign('major', $major);
        return $this->fetch();
    }

    //修改联系
    public function contact()
    {
        $data = $this->request->post();//post提交过来的数据
        $res = Db::name('user')->where(['user_id' => $this->student_id])->update($data);//更新数据
        $user = Db::name('user')->find($this->student_id);//查询用户
        session('student', $user);//更新session里的student
        if ($res === false) {
            $this->error('修改失败');
        } else {
            $this->success('修改成功');
        }
    }

   //改变专业
    public function change_major()
    {
        $data = $this->request->post();//post提交过来的数据
        $res = Db::name('user')->where(['user_id' => $this->student_id])->update($data);//更新数据
        $user = Db::name('user')->find($this->student_id);//查询用户
        session('student', $user);//更新session里的student
        if ($res === false) {
            $this->error('修改失败');
        } else {
            $this->success('修改成功');
        }
    }

    //修改密码
    public function password()
    {
        $data = $this->request->post();//post提交过来的数据

        $user = Db::name('user')->find($this->student_id);//查询学生信息
        if (encrypt($data['password']) != $user['password']) {
            $this->error('原密码不正确');
        }
        if ($data['password1'] != $data['password2']) {
            $this->error('两次密码不一致');
        }
        if ($data['password1'] == $data['password']) {
            $this->error('密码无变化');
        }
        $res = Db::name('user')->where(['user_id' => $this->student_id])->update(['password' => encrypt($data['password2'])]);//更新密码
        if ($res) {
            session('student', null);//销毁session里的student
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }

    //导师信息
    public function info()
    {
        $teacher_id = Db::name('article')->where(['student_id' => $this->student_id])->value('teacher_id');//查询导师ID
        $user = Db::name('user')->find($teacher_id);//查询导师id

        //输出变量
        $this->assign('teacher_id', $teacher_id);
        $this->assign('user', $user);
        return $this->fetch();
    }

    //异步获取专业option
    public function ajax_department()
    {
        $parent_id = $this->request->param('parent_id');//获取系别ID
        $department = Db::name('major_department')->where(['parent_id' => $parent_id])->select();//查询系别下的所有专业

        $html = '';
        foreach ($department as $k => $v) {//循环遍历组装option
            $html .= ' <option value="' . $v['id'] . '">' . $v['name'] . '</option>';
        }
        //返回html
        echo $html;
    }

}
