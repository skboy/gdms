<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;

class User extends Common
{
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
        $res = Db::name('user')->where(['user_id' => $this->teacher_id])->update($data);//更新数据
        $user = Db::name('user')->find($this->teacher_id);//查询用户
        session('teacher', $user);//更新session里的teacher
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
        $res = Db::name('user')->where(['user_id' => $this->teacher_id])->update($data);//更新数据
        $user = Db::name('user')->find($this->teacher_id);//查询用户
        session('teacher', $user);//更新session里的teacher
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

        $user = Db::name('user')->find($this->teacher_id);//查询用户
        if (encrypt($data['password']) != $user['password']) {
            $this->error('原密码不正确');
        }
        if ($data['password1'] != $data['password2']) {
            $this->error('两次密码不一致');
        }
        if ($data['password1'] == $data['password']) {
            $this->error('密码无变化');
        }
        $res = Db::name('user')->where(['user_id' => $this->teacher_id])->update(['password' => encrypt($data['password2'])]);
        if ($res) {
            session_destroy();
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }

    //学生列表
    public function student_list()
    {
        $student_id_arr = Db::name('article')->where(['teacher_id' => $this->teacher_id, 'student_id' => ['neq', 0]])->column('student_id');//统计所有学生ID
        $student_list = Db::name('user')->whereIn('user_id', $student_id_arr)->order('user_id')->select();//查询所有学生
        $this->assign('student_list', $student_list);//输出
        return $this->fetch();
    }

    //学生信息
    public function info()
    {
        $student_id = $this->request->param('student_id');//学生ID
        $student = Db::name('user')->find($student_id);//查找学生信息
        $this->assign('student', $student);//输出
        return $this->fetch('info');
    }
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
