<?php

namespace app\admin\controller;

use think\Db;

class Major extends Common
{
    //系别列表
    public function major_list()
    {
        $major = Db::name('major_department')->where(['parent_id' => 0])->select();//查找所有系别
        $this->assign('major', $major);//输出major
        return $this->fetch();
    }

    //添加或修改系别
    public function add_edit_major()
    {
        //post提交
        if (IS_POST) {
            $post = $this->request->post();//获取post提交过来的变量
            if ($post['id'] == '') {//如果id等于空,则是添加新数据
                if ($post['name'] == '') {//如果name等于空
                    $this->error('名称不能为空');
                }
                $post['parent_id'] = 0;//0表示是父类
                $res = Db::name('major_department')->insert($post);//插入提交过来的数据
                if ($res === false) {
                    $this->error('添加失败');
                } else {
                    $this->success('添加成功', '/admin/major_list');
                }
            } else {//id不等于空,修改原有数据
                $res = Db::name('major_department')->where(['id' => $post['id'], 'parent_id' => 0])->update(['name' => $post['name']]);//修改数据
                if ($res === false) {
                    $this->error('修改失败');
                } else {
                    $this->success('修改成功', '/admin/major_list');
                }
            }

        }
        //正常访问
        $id = $this->request->param('id');//获取id
        if ($id) {
            $major = Db::name('major_department')->find($id);//查找id对应的专业
            $this->assign('major', $major);//输出major
        }
        return $this->fetch();
    }

    //删除系别
    public function del_major()
    {
        $id = $this->request->param('id');//获取id
        $count = Db::name('major_department')->where(['parent_id' => $id])->count();//查询父类下的专业
        if ($count > 0) {//如果父类下存在专业,则不能删除
            $this->error('系别下有专业,不能删除');
        }
        $res = Db::name('major_department')->delete($id);//删除
        if ($res === false) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功');
        }

    }
}
