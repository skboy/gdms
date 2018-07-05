<?php

namespace app\admin\controller;

use think\Db;

class Category extends Common
{
    //分类页面
    public function category_list()
    {
        $category = Db::name('category')->select();//查询所有分类
        $this->assign('category', $category);//输出分类变量
        return $this->fetch();
    }

    //添加或修改分类
    public function add_edit_category()
    {
        //如果是post提交
        if (IS_POST) {
            $post = $this->request->post();//获取post提交过来的变量
            if ($post['category_id'] == '') {//如果category_id等于空,则是添加新数据
                if ($post['title'] == '') {//如果title等于空
                    $this->error('名称不能为空');
                }
                $res = Db::name('category')->insert($post);//插入提交过来的数据
                if ($res === false) {//插入失败
                    $this->error('添加失败');
                } else {//插入成功
                    $this->success('添加成功', '/admin/category_list');
                }
            } else {//category_id不等于空,修改原有数据
                $res = Db::name('category')->where(['category_id' => $post['category_id']])->update(['title' => $post['title']]);//修改数据
                if ($res === false) {//修改失败
                    $this->error('修改失败');
                } else {//修改成功
                    $this->success('修改成功', '/admin/category_list');
                }
            }

        }
        //正常访问

        $category_id = $this->request->param('category_id');//获取category_id
        if ($category_id) {
            $category = Db::name('category')->find($category_id);//查找category_id对应的分类
            $this->assign('category', $category);//输出category
        }
        return $this->fetch();
    }

    //删除分类
    public function del_category()
    {
        $category_id = $this->request->param('category_id');//获取category_id

        $res = Db::name('category')->delete($category_id);//删除分类
        if ($res === false) {//删除失败
            $this->error('删除失败');
        } else {//删除成功
            $this->success('删除成功');
        }
    }


}
