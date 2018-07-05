<?php

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{
    public $admin_id; //定义全局变量 admin_id

    //初始化方法
    public function _initialize()
    {
        if (!session('admin')) {//如果admin没有登录
            $this->redirect('/admin/login');//回到登录页面
        }
        //如果登录,保存admin_id
        $this->admin_id = session('admin')['admin_id'];
    }
}
