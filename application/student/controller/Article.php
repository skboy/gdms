<?php

namespace app\student\controller;

use think\Db;

class Article extends Common
{
    //论文列表
    public function article_list()
    {
        $keywords = $this->request->param('keywords');//获取搜索词
        if ($keywords) {
            $where['title|describe'] = array('like', "%$keywords%");//模糊查询 搜索条件: 表示标题或描述
        }
        $where['student_id'] = 0;//0表示还没有被学生选择的论文

        //查询论文表列  each表示查询出来后遍历查询老师名字
        $article_list = Db::name('Article')->where($where)->order('update_time desc')->paginate(10)->each(function ($item, $key) {
            $item['teacher_name'] = Db::name('user')->where(['user_id' => $item['teacher_id']])->value('name');
            return $item;
        });;
        $page = $article_list->render();//渲染分页
        $this->assign('article_list', $article_list);//输出article_list
        $this->assign('page', $page);//输出page
        return $this->fetch('index');
    }

    //论文详情
    public function detail()
    {
        $article_id = $this->request->param('article_id');//获取论文id
        $article = Db::name('Article')->find($article_id);//查询对应id的论文
        $category = Db::name('category')->find($article['category_id']);//查询论文的分类
        $teacher = Db::name('user')->find($article['teacher_id']);//从查询论文对应的老师

        //输出变量
        $this->assign('teacher', $teacher);
        $this->assign('article', $article);
        $this->assign('category', $category);
        //   dd($category);
        return $this->fetch();
    }

    //选择论文
    public function choose()
    {
        $article_id = $this->request->param('article_id', 0);//获取论文id
        // dd($article_id);
        if ($article_id == 0) {//如果论文id等于0
            $this->error('非法提交');
        }
        $count = Db::name('Article')->where(['student_id' => $this->student_id])->count();//查询是否已经选过论文题目
        if ($count > 0) {
            $this->error('你已选过题,请勿重复选择');
        }
        $article = Db::name('Article')->find($article_id);//查询该论文是否被人选
        if ($article['student_id'] != 0) {
            $this->error('少侠手速太慢,此题已被其他人选啦~');
        }
        $res = Db::name('Article')->where(['article_id' => $article_id])->update(['student_id' => $this->student_id]);//选择该论文
        if ($res) {
            $this->success('选择成功');
        } else {
            $this->error('选择失败');
        }
    }

    //修改论文题目信息 上传文件等
    public function student_article()
    {
        //post提交
        if (IS_POST) {
            $post = $this->request->post();//获取post数据

            $file1 = request()->file('proposal');//获取开题报告文件

            if ($file1) {

                $info = $file1->move(ROOT_PATH . 'public' . DS . 'uploads');//上传开题报告
                if ($info) {
                    // 成功上传后 获取上传信息
                    $data['proposal'] = '\\uploads\\' . $info->getsaveName();//获取上传后的文件路径
                    $data['proposal_name'] = $info->getInfo()['name'];//获取上传后的文件名字
                } else {//上传失败
                    // 上传失败获取错误信息
                    echo $file1->getError();
                }
            }
            $file2 = request()->file('thesis');//获取论文文件
            if ($file2) {
                $info = $file2->move(ROOT_PATH . 'public' . DS . 'uploads');//上传论文
                if ($info) {
                    // 成功上传后 获取上传信息
                    $data['thesis'] = '\\uploads\\' . $info->getsaveName();//获取上传后的文件路径
                    $data['thesis_name'] = $info->getInfo()['name'];//获取上传后的文件名字
                } else {//上传失败
                    // 上传失败获取错误信息
                    echo $file2->getError();
                }
            }
            $data['schedule'] = isset($post['schedule']) ? $post['schedule'] : 1;//如果post里没有schedule则schedule等于1
            $res = Db::name('Article')->where(['student_id' => $this->student_id])->update($data);//更新论文信息
            if ($res === false) {
                $this->error('操作失败');
            } else {
                $this->success('提交成功');
            }
        }

        //正常访问
        $article = Db::name('Article')->where(['student_id' => $this->student_id])->find();//查询学生选择的论文

        $category = Db::name('category')->find($article['category_id']);//查询论文的份额里
        $schedule = Db::name('schedule')->select();//查询进度
        $teacher = Db::name('user')->find($article['teacher_id']);//查询老师;

        //输出变量
        $this->assign('teacher', $teacher);
        $this->assign('article', $article);
        $this->assign('schedule', $schedule);
        $this->assign('category', $category);
        return $this->fetch();
    }
}
