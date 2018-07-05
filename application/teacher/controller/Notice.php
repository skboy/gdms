<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;

class Notice extends Common
{
    //公告列表
    public function notice_list()
    {
        $notice_list = Db::name('notice')->where(['user_id' => $this->teacher_id])->order('update_time desc')->paginate(10);//查询该老师发布的公告 每页10
        $page = $notice_list->render();//渲染分页
        //输出变量
        $this->assign('notice_list', $notice_list);
        $this->assign('page', $page);
        return $this->fetch('index');
    }

    //编辑或添加公告
    public function notice_add_edit()
    {
        //post提交
        if (IS_POST) {
            $post = $this->request->post();//post数据
            //验证规则
            $rule = [
                'title|标题' => 'require',
                'describe|内容' => 'require',

            ];
            //规则错误信息
            $msg = [
                'title.require' => '标题不能为空',
                'describe.require' => '内容不能为空',
            ];

            $validate = new Validate($rule, $msg);//实例化验证器
            $result = $validate->check($post);//验证post数据
            if (!$result) {//如果错误,则返回错误信息
                $this->error($validate->getError());
            }
            //如果notice_id不为空则是编辑
            if (($post['notice_id'])!='') {
                $data['title'] = $post['title'];//标题
                $data['content'] = $post['describe'];//描述
                $data['update_time'] = time();//更新时间戳
                $res = Db::name('Notice')->where(['notice_id'=>$post['notice_id']])->update($data);//更新
                $url='/teacher/notice_list';
            } else {
                //新增
                $data['title'] = $post['title'];//标题
                $data['content'] = $post['describe'];//描述
                $data['user_id'] = $this->teacher_id;//该老师的ID
                $data['create_time'] = time();//创建时间戳
                $data['update_time'] = time();//更新时间戳
                $res = Db::name('Notice')->insertGetId($data);//插入
                $url='/teacher/notice_add_edit';
            }
            if ($res) {
                $this->success('操作成功',$url );
            } else {
                $this->error('操作失败');
            }
        }

        //正常访问
        $notice_id = $this->request->param('notice_id');//获取notice_id
        if ($notice_id) {
            $notice = Db::name('notice')->find($notice_id);//查询该公告
            //输出
            $this->assign('notice', $notice);
        }
        return $this->fetch('add_edit');
    }

    //公告详情
    public function notice_detail(){
        $notice_id = $this->request->param('notice_id');//获取notice_id
        $notice = Db::name('notice')->find($notice_id);//查询该公告

        //输出
        $this->assign('notice', $notice);;
        return $this->fetch('detail');
    }

    //删除公告
    public function delete(){
        $notice_id = $this->request->param('notice_id');//获取notice_id
        $res = Db::name('Notice')->delete($notice_id);//删除
        if ($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}
