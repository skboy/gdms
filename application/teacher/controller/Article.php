<?php

namespace app\teacher\controller;

use think\Db;
use think\Validate;

class Article extends Common
{
    //论文列表
    public function article_list()
    {
        $article_list = Db::name('Article')->where(['teacher_id' => $this->teacher_id])->order('update_time desc')->paginate(10);//查询自己发布的论文 每页10条记录
        $page = $article_list->render();//渲染分页
        //输出变量
        $this->assign('article_list', $article_list);
        $this->assign('page', $page);
        return $this->fetch('index');
    }

    //添加或修改论文
    public function add_edit()
    {
        $article_id = $this->request->param('article_id');//获取论文ID
        if ($article_id) {
            $article = Db::name('Article')->find($article_id);//查询对应论文
            if ($article['student_id'] > 0) {//如果学生已经选择
                $this->error('学生已选择题目,不能修改');
            }
            $this->assign('article', $article);
        }

        if (IS_POST) {//POST提交

            $post = $this->request->post();//post数据

            //验证规则
            $rule = [
                'category_id|分类' => 'require',
                'title|标题' => 'require',
                'describe|描述' => 'require',

            ];

            //验证返回错误信息
            $msg = [
                'category_id.require' => '分类不能为空',
                'title.require' => '标题不能为空',
                'describe.require' => '描述不能为空',
            ];
            $validate = new Validate($rule, $msg);//实例化验证器
            $result = $validate->check($post);//检查post数据
            if (!$result) {//如果不符合,则返回错误信息
                $this->error($validate->getError());
            }
            //如果article_id不为空,表示修改论文信息
            if (($post['article_id']) != '') {

                $data['title'] = $post['title'];//论文标题
                $data['describe'] = $post['describe'];//论文描述
                $data['category_id'] = $post['category_id'];//分类ID
                $data['update_time'] = time();//更新时间戳
                $res = Db::name('Article')->where(['article_id' => $post['article_id']])->update($data);//更新操作
                $url = '/teacher/article_list';
            } else {
                //新增论文
                $data['title'] = $post['title'];//标题
                $data['describe'] = $post['describe'];//描述
                $data['teacher_id'] = $this->teacher_id;//所属老师ID
                $data['category_id'] = $post['category_id'];//分类ID
                $data['create_time'] = time();//创建时间
                $data['update_time'] = time();//更新时间
                $res = Db::name('Article')->insertGetId($data);//插入数据
                $url = '/teacher/add_edit';
            }
            if ($res) {
                $this->success('操作成功', $url);
            } else {
                $this->error('操作失败');
            }

        }
        //正常访问
        $category = Db::name('category')->order('sort asc')->select();//查询分类
        //输出变量
        $this->assign('category', $category);
        return $this->fetch();
    }


    //论文详情
    public function detail()
    {
        $article_id = $this->request->param('article_id');//论文ID
        $article = Db::name('Article')->find($article_id);//查询论文
        //post提交
        if (IS_POST) {
           /* if ($article['schedule'] != 5) {//论文进度未完成不能打分
                $this->error('该学生未完成该论文,不能评分');
            }*/
            $content = $this->request->param('content');//获取评语
            if ($content == '') {
                $this->error('评语不能为空');
            }

            $point = $this->request->param('point');//获取评分
            if ($point == '') {
                $this->error('评分不能为空');
            }
            $data = [
                'content' => $content,
                'point' => $point
            ];
            $res = Db::name('Article')->where(['article_id' => $article_id])->update($data);//更新数据
            if ($res === false) {
                $this->error('评分失败');
            } else {
                $this->error('提交成功');
            }
        }

        //正常访问
        $category = Db::name('category')->find($article['category_id']);//查询论文分类
        if ($article['student_id'] != 0) {//如果论文被学生选了
            $student = Db::name('user')->find($article['student_id']);//查询学生信息
            $this->assign('student', $student);//输出
        }
        $article['schedule'] = Db::name('schedule')->where(['id' => $article['schedule']])->value('name');//查询进度

        //输出变量
        $this->assign('article', $article);
        $this->assign('category', $category);
        return $this->fetch();
    }

    //删除论文
    public function delete()
    {
        $article_id = $this->request->param('article_id');//获取论文ID
        $article = Db::name('Article')->find($article_id);//查找论文

        if ($article['student_id'] != 0) {//已选不能删除
            $this->error('此题目已被选生选择,不能删除');
        }
        $res = Db::name('Article')->delete($article_id);//删除
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}
