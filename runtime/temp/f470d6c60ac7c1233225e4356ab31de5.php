<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:88:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\major\add_edit_major.html";i:1521770391;s:79:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\public\link.html";i:1521770391;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\public\header.html";i:1521770391;s:79:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\public\left.html";i:1521770391;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\public\footer.html";i:1521770391;s:77:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/admin\public\js.html";i:1521770391;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>毕业设计管理系统后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia-responsive.css" />
<link rel="stylesheet" type="text/css" href="/static/css/pages/login.css" />


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style>
    .faq-search input {
        width: 96%;
        display: block;
        padding: 2%;
    }

    .faq-search {
        margin-bottom: 2em;
        text-align: right;
    }

    .widget {
        position: relative;
        clear: both;
        width: auto;
        margin-bottom: 2em;
    }
</style>
<body>

<style>
    a {
        text-decoration: none;
        color: #333333
    }

    a:hover, a:visited, a:link, a:active {
        text-decoration: none;
        color: #333333
    }
</style>
<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="./">毕业设计管理系统后台</a>
            <?php if(\think\Session::get('admin')): ?>
            <div class="nav-collapse">

                <ul class="nav pull-right">
                  <!--  <li>
                        <a href="#"><span class="badge badge-warning">7</span></a>
                    </li>-->

                    <li class="divider-vertical"></li>

                    <li class="">

                        <a data-toggle="dropdown" class="dropdown-toggle " href="/admin/logout">
                          注销
                        </a>

                    </li>
                </ul>

            </div>
            <?php endif; ?>
            <div class="nav-collapse">

               <!-- <ul class="nav pull-right">

                    <li class="">
                        <a href="javascript:;"><i class="icon-chevron-left"></i> Back to Homepage</a>
                    </li>
                </ul>-->

            </div> <!-- /nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->
<div id="content">

    <div class="container">

        <div class="row">

            
<div class="span3">

    <div class="account-container">

        <div class="account-avatar" id="crop-avatar">
            <div class="avatar-view" title="" style="width: 55px; height:55px;"data-original-title="">
                <img src="" alt="" class="thumbnail" />
            </div>
        </div> <!-- /account-avatar -->

        <div class="account-details">

            <span class="account-name">admin</span>

            <span class="account-role">管理员</span>

            <span class="account-actions">

						</span>

        </div> <!-- /account-details -->

    </div> <!-- /account-container -->

    <hr />

    <ul id="main-nav" class="nav nav-tabs nav-stacked">

        <li class="<?php if(($controller == "Index")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/admin/index'); ?>">
                <i class="icon-home"></i>
               首页
            </a>
        </li>

        <li class="<?php if(($controller == "Major")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/major_list'); ?>">
            <i class="icon-th-list"></i>
           系别管理
        </a>
        </li>
        <li class="<?php if(($controller == "Department")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/department_list'); ?>">
            <i class="icon-th-list"></i>
            专业管理
        </a>
        </li>

        <li class="<?php if(($controller == "Category")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/category_list'); ?>">
            <i class="icon-th-large"></i>
            分类管理
            <!-- <span class="label label-warning pull-right">5</span>-->
        </a>
        </li>

        <li class="<?php if(($controller == "Schedule")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/schedule_list'); ?>">
            <i class="icon-pushpin"></i>
            进度管理
        </a>
        </li>

        <li class="<?php if(($controller == "Student")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/admin/student_list'); ?>">
                <i class="icon-user"></i>
                学生管理
            </a>
        </li>
        <li class="<?php if(($controller == "Teacher")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/teacher_list'); ?>">
            <i class="icon-user"></i>
            教师管理
        </a>
        </li>
        <li class="<?php if(($controller == "Admin")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/admin/setting'); ?>">
            <i class="icon-cog"></i>
            设置
        </a>
        </li>

    </ul>




    <br />

</div> <!-- /span3 -->



            <div class="span9">

                <h1 class="page-title">
                    <i class="icon-home"></i>
                    首页
                </h1>

                <div class="stat-container">
                    <h3>专业管理</h3>
                    <div class="widget widget-table">

                        <div class="widget-header">
                            <i class="icon-th-list"></i>
                            <h3>列表</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <form id="edit-profile" method="post" class="form-horizontal" style="margin-top: 20px">

                                <fieldset>

                                    <div class="control-group">
                                        <label class="control-label" for="name">系别名字</label>
                                        <div class="controls">
                                            <input type="text" class="input-medium disabled"name="name" id="name"
                                                   value="<?php if(isset($major)): ?><?php echo $major['name']; endif; ?>">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <input type="hidden" class="input-medium disabled"name="id" id="id" value="<?php if(isset($major)): ?><?php echo $major['id']; endif; ?>">






                                    <div class="form-actions" style="background-color: white;border-top: none">
                                        <button type="submit" class="btn btn-primary">提交</button>
                                    </div> <!-- /form-actions -->
                                </fieldset>
                            </form>
                        </div>

                    </div> <!-- /stat-container -->

                </div> <!-- /span9 -->


            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /content -->


    <div  style=" /*position:fixed; bottom:0;*/width: 100%">

    <div class="container">
        <hr />
        <p style="text-align: center">&copy; 2018 毕业设计管理系统.</p>
    </div> <!-- /container -->

</div> <!-- /footer -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.js"></script>
<script type="text/javascript" src="/static/js/excanvas.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.flot.js"></script>
<script type="text/javascript" src="/static/js/jquery.flot.pie.js"></script>
<script type="text/javascript" src="/static/js/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="/static/js/charts/bar.js"></script>
</body>
</html>
