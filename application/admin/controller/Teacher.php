<?php

namespace app\admin\controller;

use think\Db;

class Teacher extends Common
{
    //老师列表
    public function teacher_list()
    {

        $keywords = $this->request->param('keywords');//获取搜索词
        $where['type'] = 1;//1表示学生
        if ($keywords) {
            $where['number|name'] = array('like', "%$keywords%");//模糊查询 搜索条件: 表示工号或名字
        }

        $teacher = Db::name('user')->where($where)->paginate(15);//查询老师 分页 每页15条记录

        $page = $teacher->render();//渲染分页
        $this->assign('page', $page);//输出page
        $this->assign('teacher', $teacher);//teacher
        return $this->fetch();
    }

    //修改老师密码
    public function edit_teacher()
    {
        //post提交
        if (IS_POST) {
            $post = $this->request->post();//post提交过来的数据
            if ($post['password'] == '') {//如果密码等于空
                $this->error('密码不能为空');
            } else {
                $res = Db::name('user')->where(['user_id' => $post['user_id']])->update(['password' => encrypt($post['password'])]);//更新密码
                if ($res === false) {
                    $this->error('修改失败');
                } else {
                    $this->success('修改成功', '/admin/student_list');
                }
            }

        }
        $user_id = $this->request->param('user_id');//获取user_id

        $this->assign('user_id', $user_id);//输出user_id

        return $this->fetch();
    }

    //删除老师
    public function del_student()
    {
        $user_id = $this->request->param('user_id');//获取user_id

        $res = Db::name('user')->delete($user_id);//删除老师
        if ($res === false) {
            $this->error('删除失败');
        } else {
            $this->success('删除成功');
        }

    }

    //导入老师EXCEL
    public function import()
    {
        if (IS_POST) {
            $file = request()->file("file");//获取excel文件
            if ($file == "") {
                $this->error('文件不能为空');
            };
            $tmpFilePath = $file->getRealPath();//获取文件真实路径
            $obj_PHPExcel = \PHPExcel_IOFactory::createReader('Excel2007');//实例化php excel的类
            $obj = $obj_PHPExcel->load($tmpFilePath);//读取excel信息
            $data = $obj->getSheet()->toArray();//转化成数组
            array_shift($data);//删除第一行标题

            foreach ($data as $k => $v) {//遍历循环 创建要插入的老师信息
                $user_data[$k]['number'] = $v[0];
                $user_data[$k]['name'] = $v[1];
                $user_data[$k]['password'] = encrypt(substr($v[2], -6));//身份证后6位作为密码
                $user_data[$k]['type'] = 1;
            }

            $res = Db::name('user')->insertAll($user_data);//插入有所数据
            if ($res === false) {
                $this->error('导入失败');
            } else {
                $this->success('导入成功');
            }
        }
        return $this->fetch();
    }


}
