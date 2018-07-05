<?php
namespace app\student\controller;
use think\Controller;
use think\Db;
class Common extends Controller
{
    public $student_id;//定义全局变量
    public function _initialize(){
        if (!session('student')) {//如果session里没有student 就是没登录
            $this->redirect('/student/login');
        }
        $this->student_id=session('student')['user_id'];//把user_id赋值给student_id
        $user=Db::name('user')->find( $this->student_id);//查询该学生
        //输出变量
        $this->assign('user',$user);
    }
}
