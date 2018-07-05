<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\index\index.html";i:1521770391;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\public\link.html";i:1521770391;s:83:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\public\header.html";i:1521770391;s:81:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\public\left.html";i:1521770391;s:83:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\public\footer.html";i:1521770391;s:79:"D:\phpStudy\PHPTutorial\WWW\gdms\application/../template/student\public\js.html";i:1521770391;}*/ ?>
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

            <a class="brand" href="./">毕业设计管理系统</a>
            <?php if(\think\Session::get('student')): ?>
            <div class="nav-collapse">

                <ul class="nav pull-right">
                  <!--  <li>
                        <a href="#"><span class="badge badge-warning">7</span></a>
                    </li>-->

                    <li class="divider-vertical"></li>

                    <li class="">

                        <a data-toggle="dropdown" class="dropdown-toggle " href="/student/logout">
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

        <li class="<?php if(($controller == "Index")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/student/index'); ?>">
                <i class="icon-home"></i>
               首页
            </a>
        </li>

        <li class="<?php if(($action == "article_list") or ($action == "detail")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/student/article_list'); ?>">
            <i class="icon-th-list"></i>
            论文选题
        </a>
        </li>
        <li class="<?php if(($action == "student_article")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/student/student_article'); ?>">
                <i class="icon-pushpin"></i>
               我的选题
            </a>
        </li>



        <li class="<?php if(($action == "message_list")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/student/message_list'); ?>">
                <i class="icon-th-large"></i>
                留言
               <!-- <span class="label label-warning pull-right">5</span>-->
            </a>
        </li>

        <li class="<?php if(($controller == "Rank")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/student/rank'); ?>">
                <i class="icon-signal"></i>
                排行榜
            </a>
        </li>

        <li class="<?php if(($controller == "User")  and ($action == "info")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/student/teacher_info'); ?>">
                <i class="icon-user"></i>
                导师信息
            </a>
        </li>
        <li class="<?php if(($controller == "User")  and ($action == "setting")): ?>active<?php endif; ?>">
        <a href="<?php echo url('/student/setting'); ?>">
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
                    <i class="icon-home"></i>
                    首页
                </h1>

                <div class="stat-container">
                    <h3>公告</h3>
                    <?php if(empty($notice_list['data'])): ?>

                    <div class="widget">
                            <h5 style="color: #333333">    <span style="">  暂无公告 </span>
                            </h5>

                    </div></a>
                    <?php else: if(is_array($notice_list) || $notice_list instanceof \think\Collection || $notice_list instanceof \think\Paginator): $i = 0; $__LIST__ = $notice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('/student/notice_detail',array('notice_id'=>$vo['notice_id'])); ?>">
                        <div class="widget">

                            <div class="widget-content">

                                <h3>    <span style=""><?php echo $vo['title']; ?> </span>
                                    <span style="float: right;font-size: 12px;color: #333333"><?php echo date("Y-m-d H:i:s",$vo['update_time']); ?></span></h3>
                                <p style="float: right">老师:<?php echo $teacher['name']; ?></p>
                            </div> <!-- /widget-content -->

                        </div></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div style="margin: 0 auto;float: right"> <?php echo $page; ?></div>
                    <?php endif; ?>


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
