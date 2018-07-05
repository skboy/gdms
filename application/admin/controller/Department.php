<?php

namespace app\admin\controller;

use think\Db;

class Department extends Common
{
    //专业列表
    public function department_list()
    {
        $major_department = Db::name('major_department')->where(['parent_id' => 0])->select();//查询专业父类

        foreach ($major_department as $k => $v) {
            $major_department[$k]['child'] = Db::name('major_department')->where(['parent_id' => $v['id']])->select();//查找父类下的专业
        }
        $this->assign('major_department', $major_department);//输入变量
        return $this->fetch();
    }

    //添加或修改专业
    public function add_edit_department()
    {
        //post提交
        if (IS_POST) {//post提交
            $post = $this->request->post();//获取post提交过来的变量
            if ($post['id'] == '') {//如果id等于空,则是添加新数据
                if ($post['name'] == '') {//如果name等于空
                    $this->error('名称不能为空');
                }
                $res = Db::name('major_department')->insert($post);//插入提交过来的数据
                if ($res === false) {
                    $this->error('添加失败');
                } else {
                    $this->success('添加成功', '/admin/department_list');
                }
            } else {//id不等于空,修改原有数据
                $res = Db::name('major_department')->where(['id' => $post['id']])->update(['name' => $post['name'], 'parent_id' => $post['parent_id']]);//修改数据
                if ($res === false) {
                    $this->error('修改失败');
                } else {
                    $this->success('修改成功', '/admin/department_list');
                }
            }

        }
        //正常访问
        $id = $this->request->param('id');//获取id
        $major = Db::name('major_department')->where(['parent_id' => 0])->select();//查找id对应的专业
        $this->assign('major', $major);//输出major
        if ($id) {//如果id不为空
            $department = Db::name('major_department')->find($id);//查找对应的专业
            $this->assign('department', $department);//输入department
        }
        return $this->fetch();
    }

    //删除专业
    public function del_department()
    {
        $id = $this->request->param('id');//获取id
        $department = Db::name('major_department')->find($id);//查找该专业
        if ($department['parent_id' == 0]) {//如果是父类,删除失败
            $this->error('删除失败');
        }
        $res = Db::name('major_department')->delete($id);//删除
        if ($res === false) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功');
        }

    }


}
