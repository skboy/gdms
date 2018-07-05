<?php
namespace app\student\controller;
use think\Controller;
use think\Db;
class Login extends Controller
{
    //登录页面
    public function index(){
       if( session('student')){//如果session已经存在student
           $this->redirect('/student/index');
       }
       return $this->fetch();
    }

    //登录操作
    public function do_login(){
        //post提交表单
        if($this->request->isPost()){
            $student_number=input('number');//获取学号
            $password=input('password');//获取密码
            $user=Db::name('user')->where(['number'=>$student_number])->find();//查找对应账号
            if ($user['type']!=0){//如果不是学生
                $this->error('你不是学生');
            }
            if ($user['password']!=encrypt($password)){//密码错误
                $this->error('密码错误');
            }else{
              //  $user['major_name']=Db::name('major_department')->where(['id'=>$user['major']])->value('name');
             //   $user['department_name']=Db::name('major_department')->where(['id'=>$user['department']])->value('name');
                session('student',$user);//登录成功存入session
                $this->redirect('/student/index');
            }
            //dd($user);
        }
    }

    //注销
    public function logout(){
        session('student', null);//清空session里的student
        $this->redirect('/student/login');
    }

}
