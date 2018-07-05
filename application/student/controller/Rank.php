<?php

namespace app\student\controller;

use think\Db;

class Rank extends Common
{
    public function index()
    {
        //查询专业排行
        $department_rank = Db::name('article')->alias('a')->join('user u', 'u.user_id=a.student_id')
            ->where(['u.department' => session('student')['department'], 'a.point' => ['neq', '']])
            ->field('a.point,u.name,u.user_id')->limit(10)->order('a.point desc')->select();

        //查询系排行
        $major_rank = Db::name('article')->alias('a')->join('user u', 'u.user_id=a.student_id')
            ->where(['u.major' => session('student')['major'], 'a.point' => ['neq', '']])
            ->field('a.point,u.name,u.user_id')->limit(10)->order('a.point desc')->select();

        //查询全校排行
        $all_rank = Db::name('article')->alias('a')->join('user u', 'u.user_id=a.student_id')
            ->where(['a.point' => ['neq', '']])
            ->field('a.point,u.name,u.user_id')->limit(10)->order('a.point desc')->select();

        //输出变量
        $this->assign('department_rank', $department_rank);
        $this->assign('major_rank', $major_rank);
        $this->assign('all_rank', $all_rank);
        return $this->fetch();
    }


}
