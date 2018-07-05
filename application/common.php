<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
// 应用公共文件
function dd($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    exit();
}

//密码加密
function encrypt($str){
    return md5('gdms'.$str);
}
function get_avatar($user_id){
    $avatar=Db::name('user')->where(['user_id'=>$user_id])->value('avatar');

    return $avatar;
}
function get_major_name($major){
   $major_name= $user['major_name']=Db::name('major_department')->where(['id'=>$major])->value('name');
    return $major_name;
}
function get_department_name($department){
    $department_name=Db::name('major_department')->where(['id'=>$department])->value('name');
    return $department_name;
}