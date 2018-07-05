<?php

namespace app\admin\controller;

use think\Db;

class Schedule extends Common
{
    //进度列表
    public function schedule_list()
    {
        $schedule = Db::name('schedule')->order('sort asc')->select();//按sort升序查找所有进度
        $this->assign('schedule', $schedule);//输出schedule
        return $this->fetch();
    }

    //添加或修改进度
    public function add_edit_schedule()
    {
        //post提交
        if (IS_POST) {
            $post = $this->request->post();//获取post提交过来的变量

            if ($post['id'] == '') {//如果id等于空,则是添加新数据
                if ($post['name']==''){//如果name等于空
                    $this->error('名称不能为空');
                }
                $res = Db::name('schedule')->insert($post);//插入提交过来的数据
                if ($res === false) {
                    $this->error('添加失败');
                } else {
                    $this->success('添加成功', '/admin/schedule_list');
                }
            } else {//id不等于空,修改原有数据
                $res = Db::name('schedule')->where(['id' => $post['id']])->update(['name' => $post['name']]);
                if ($res === false) {
                    $this->error('修改失败');
                } else {
                    $this->success('修改成功','/admin/schedule_list');
                }
            }

        }
        //正常访问
        $id = $this->request->param('id');//获取id
        if ($id) {
            $schedule = Db::name('schedule')->find($id);//查找id对应的专业
            $this->assign('schedule', $schedule);//输出schedule
        }
        return $this->fetch();
    }

    //删除进度
    public function del_schedule()
    {
        $id = $this->request->param('id');//获取id

        $res = Db::name('schedule')->delete($id);//删除
        if ($res === false) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功');
        }
    }




    }
