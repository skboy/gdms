<?php
/**
 * Created by PhpStorm.
 * User: skboy
 * Date: 2018/6/8
 * Time: 15:13
 */
namespace app\teacher\model;
use think\Model;

class Article extends Model
{
    public function student(){
        return $this->belongsTo('User','student_id');
    }
}