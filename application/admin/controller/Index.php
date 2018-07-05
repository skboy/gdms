<?php

namespace app\admin\controller;

use think\Db;

class Index extends Common
{
    //首页
    public function index()
    {
        return $this->fetch();
    }


}
