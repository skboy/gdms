<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:92:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/teacher\schedule\schedule_list.html";i:1528678162;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/teacher\public\link.html";i:1521770391;s:83:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/teacher\public\header.html";i:1521770391;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/teacher\public\left.html";i:1528448017;s:83:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/teacher\public\footer.html";i:1521770391;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>毕业设计管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia-responsive.css" />



    <link rel="stylesheet" type="text/css" href="/static/css/pages/plans.css" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        a {
            text-decoration: none;

        }

        a:hover, a:visited, a:link, a:active {
            text-decoration: none;

        }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top">

    <style>
    #content{
        min-height: 800px
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

            <a class="brand" href="./">毕业设计管理系统</a>
            <?php if(\think\Session::get('teacher')): ?>
            <div class="nav-collapse">

                <ul class="nav pull-right">


                    <li class="">

                        <a data-toggle="dropdown" class="dropdown-toggle " href="/teacher/logout">
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

</div> <!-- /navbar --><!-- /navbar-inner -->

</div> <!-- /navbar -->


<div id="content">

    <div class="container">

        <div class="row">

            <script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/static/cropper/cropper.min.css" />
<link rel="stylesheet" type="text/css" href="/static/sitelogo/sitelogo.css" />
<script type="text/javascript" src="/static/cropper/cropper.min.js"></script>
<script type="text/javascript" src="/static/sitelogo/sitelogo.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.js"></script>

<div class="span3">

    <div class="account-container">

        <div class="account-avatar" id="crop-avatar">
            <div class="avatar-view" title="" style="width: 55px; height:55px;"data-original-title="上传头像">
                <img src="<?php echo $user['avatar']; ?>" alt="" class="thumbnail" />
            </div>
        </div> <!-- /account-avatar -->

        <div class="account-details">

            <span class="account-name"><?php echo $user['name']; ?></span>

            <span class="account-role"><?php if($user['type'] == 0): ?>学生<?php else: ?>老师<?php endif; ?></span>

            <?php if(($user['major'] != null) and ($user['department'] != null)): ?>
            <span class="account-actions">
						<a href="javascript:;"><?php echo get_major_name($user['major']); ?></a>	 |

						<a href="javascript:;"><?php echo get_department_name($user['department']); ?></a>
						</span>
            <?php else: endif; ?>

        </div> <!-- /account-details -->

    </div> <!-- /account-container -->

    <hr />

    <ul id="main-nav" class="nav nav-tabs nav-stacked">

        <li class="<?php if($action == "index"): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/index'); ?>">
                <i class="icon-home"></i>
               首页
            </a>
        </li>

        <li class="<?php if($action == "add_edit"): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/add_edit'); ?>">
                <i class="icon-pushpin"></i>
                题目申报
            </a>
        </li>

        <li class="<?php if(($action == "article_list") or ($action == "detail")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/article_list'); ?>">
                <i class="icon-th-list"></i>
                题目管理
            </a>
        </li>

        <li class="<?php if(($controller == "Notice")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/notice_list'); ?>">
                <i class="icon-th-large"></i>
              管理公告
               <!-- <span class="label label-warning pull-right">5</span>-->
            </a>
        </li>

        <li class="<?php if(($action == "student_list") or ($action == "info")): ?>active<?php endif; ?>" >
            <a href="<?php echo url('/teacher/student_list'); ?>">
                <i class="icon-user"></i>
               学生信息
            </a>
        </li>
        <li class="<?php if(($controller == "Schedule")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/schedule'); ?>">
                <i class="icon-pushpin"></i>
                进度管理
            </a>
        </li>
        <li class="<?php if(($action == "setting")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/setting'); ?>">
                <i class="icon-cog"></i>
                设置
            </a>
        </li>

    </ul>


</div> <!-- /span3 -->

<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="avatar-form" action="<?php echo url('index/upload'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">上传头像</h4>
                </div>
                <div class="modal-body"style="max-height: 100%">
                    <div class="avatar-body">
                        <div class="avatar-upload">
                            <input class="avatar-src" name="avatar_src" type="hidden">
                            <input class="avatar-data" name="avatar_data" type="hidden">
                            <label for="avatarInput">图片上传</label>
                            <input class="avatar-input" id="avatarInput" name="avatar_file" type="file"></div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper"></div>
                            </div>
                        </div>
                        <div class="row avatar-btns">

                            <div class="col-md-3">
                                <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>


            <div class="span9">

                <h1 class="page-title">
                    <i class="icon-th-large"></i>
                    进度管理
                </h1>
                <table class="table table-hover" style="background-color: white;">
                    <thead>
                    <tr style="font-size: 16px">
                        <th style="width: 25%">论文题目</th>
                        <th style="width: 20%">学生名字</th>
                        <th style="width: 30%">进度</th>
                        <th style="width: 25%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $i = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['title']; ?> </td>
                        <td><?php echo $vo['student']['name']; ?> </td>
                        <td> <div class="progress" style="margin-bottom:0px;height: 15px;border-radius: 50px;">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                                 aria-valuemin="0" aria-valuemax="100"
                                 style="line-height: 15px;width: 50%;background-color: #5cb85c">
                               50%
                            </div>
                        </div> </td>

                        <td><a href="">查看</a></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

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


<script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.js"></script>
<script>
    $(function () {

    })
</script>
</body>
</html>
