<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

//老师模板路由
Route::group('teacher',function(){
    Route::get('login','teacher/Login/index');
    Route::get('index','teacher/Index/index');
    Route::get('setting','teacher/User/setting');
    Route::get('message_list','teacher/Index/message_list');
    Route::post('add_message','teacher/Index/add_message');
    Route::post('do_login','teacher/Login/do_login');
    Route::get('logout','teacher/Login/logout');
    Route::any('add_edit','teacher/Article/add_edit');
    Route::any('detail','teacher/Article/detail');
    Route::any('article_list','teacher/Article/article_list');
    Route::any('notice_list','teacher/Notice/notice_list');
    Route::any('notice_detail','teacher/Notice/notice_detail');
    Route::any('notice_add_edit','teacher/Notice/notice_add_edit');
    Route::get('student_list','teacher/User/student_list');
    Route::get('student_info','teacher/User/info');
    Route::any('schedule','teacher/Schedule/schedule_list');
    Route::any('task_list','teacher/Schedule/task_list');
    Route::any('task_add_edit','teacher/Schedule/task_add_edit');
    Route::any('task_add_all','teacher/Schedule/task_add_all');
    Route::any('task_delete','teacher/Schedule/task_delete');
    Route::any('task_detail','teacher/Schedule/task_detail');

});

Route::group('student',function(){
    Route::get('login','student/Login/index');
    Route::get('setting','student/User/setting');
    Route::get('teacher_info','student/User/info');
    Route::get('rank','student/Rank/index');
    Route::get('index','student/Index/index');
    Route::post('do_login','student/Login/do_login');
    Route::get('logout','student/Login/logout');
    Route::get('detail','student/Article/detail');
    Route::get('article_list','student/Article/article_list');
    Route::get('message_list','student/Message/message_list');
    Route::post('add_message','student/Message/add_message');
    Route::any('notice_detail','student/Index/notice_detail');
    Route::any('student_article','student/Article/student_article');
    Route::any('task_list','student/Schedule/task_list');
    Route::any('task_detail','student/Schedule/task_detail');
});

//管理员模板路由
Route::group('admin',function(){
    Route::get('login','admin/Login/index');
    Route::post('do_login','admin/Login/do_login');
    Route::get('logout','admin/Login/logout');
    Route::get('index','admin/Index/index');
    Route::get('major_list','admin/Major/major_list');
    Route::any('add_edit_major','admin/Major/add_edit_major');
    Route::any('del_major','admin/Major/del_major');

    Route::get('department_list','admin/Department/department_list');
    Route::any('add_edit_department','admin/Department/add_edit_department');
    Route::any('del_department','admin/Department/del_department');

    Route::any('category_list','admin/Category/category_list');
    Route::any('add_edit_category','admin/Category/add_edit_category');
    Route::any('del_category','admin/Category/del_category');


    Route::any('schedule_list','admin/Schedule/schedule_list');
    Route::any('add_edit_schedule','admin/Schedule/add_edit_schedule');
    Route::any('del_schedule','admin/Schedule/del_schedule');



    Route::any('student_list','admin/Student/student_list');
    Route::any('edit_student','admin/Student/edit_student');
    Route::any('del_student','admin/Student/del_student');
    Route::any('student_import','admin/Student/import');

    Route::any('teacher_list','admin/Teacher/teacher_list');
    Route::any('edit_teacher','admin/Teacher/edit_teacher');
    Route::any('del_teacher','admin/Teacher/del_teacher');
    Route::any('teacher_import','admin/Teacher/import');
    Route::any('setting','admin/Admin/setting');



});

