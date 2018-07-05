<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;

class Login extends Controller
{
    //登录页面
    public function index()
    {
        if (session('admin')){//如果已经登录
            $this->redirect('/admin/index');
        }
            return $this->fetch();
    }

    //登录操作
    public function do_login()
    {
        //提交表单
        if ($this->request->isPost()) {
            $account = input('account');//获取登录账号
            $password = input('password');//等去登录密码
            $admin = Db::name('admin')->where(['account' => $account])->find();//查找相应记录
            if ($admin['password'] != encrypt($password)) {
                $this->error('密码错误');
            } else {
                session('admin', $admin);//登录成功记录session
                $this->redirect('Index/index');
            }
        }

    }
    //注销
    public function logout(){
        session('admin', null);//清空session
        $this->redirect('/admin/login');
    }


}
