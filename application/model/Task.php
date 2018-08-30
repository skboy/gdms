<?php
/**
 * Created by PhpStorm.
 * User: skboy
 * Date: 2018/6/8
 * Time: 15:13
 */
namespace app\model;
use think\Model;

class Task extends Model
{
    public function article(){
        return $this->belongsTo('Article','article_id');
    }
}