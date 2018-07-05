<?php

namespace app\admin\controller;

use think\Db;

class Admin extends Common
{
    //设置页面
    public function setting()
    {
        return $this->fetch();
    }

    //初始化方法
    public function initialization()
    {
        Db::name('user')->delete(true);//清空用户表
        Db::name('article')->delete(true);//清空论文表
        Db::name('notice')->delete(true);//清空公告表
        Db::name('message')->delete(true);//清空留言表
        $this->success('初始化成功');
    }


}
