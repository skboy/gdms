<?php
namespace app\teacher\controller;
use think\Controller;
use think\Db;
class Common extends Controller
{
    public $teacher_id;//定义全局变量
    public function _initialize(){

        if (!session('teacher')) {//如果session里有teacher表示已经登录
            $this->redirect('/teacher/login');
        }
        $this->teacher_id=session('teacher')['user_id'];//复制teacher_id
        $user=session('teacher');

        $this->assign('user',$user);
    }
}
