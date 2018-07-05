<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;
use app\teacher\model\Article ;
class Schedule extends Common
{
    public function schedule_list(){
        $Article=new Article();
        $where['teacher_id']=$this->teacher_id;
        $where['student_id']=['gt',0];

        $article_list = $Article->with('student')->where($where)->order('update_time desc')->select();//查询自己发布的论文 每页10条记录
        //输出变量
        $this->assign('article_list', $article_list);
        return $this->fetch();
    }


}
