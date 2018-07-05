<?php
namespace app\teacher\controller;
use think\Controller;
use think\Db;
class Login extends Controller
{
    //登录页面
    public function index(){
       if(session('teacher')){//如果session里有teacher表示已经登录
           $this->redirect('/teacher/index');//返回首页
       }
       return $this->fetch();
    }
    //登录操作
    public function do_login(){
        //提交表单
        if($this->request->isPost()){
            $student_number=input('number');
            $password=input('password');
            $user=Db::name('user')->where(['number'=>$student_number])->find();

            if ($user['type']!=1){
                $this->error('你不是老师');
            }
            if ($user['password']!=encrypt($password)){
                $this->error('密码错误');
            }else{


                session('teacher',$user);
                $this->redirect('/teacher/index');
            }
            //dd($user);
        }
    }
    public function logout(){
        session('teacher', null);
        $this->redirect('/teacher/login');
    }

}
