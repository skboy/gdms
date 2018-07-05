<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:69:"G:\AppServ\www\gdms\application/../template/student\user\setting.html";i:1519378074;s:68:"G:\AppServ\www\gdms\application/../template/student\public\link.html";i:1512299457;s:70:"G:\AppServ\www\gdms\application/../template/student\public\header.html";i:1518845337;s:68:"G:\AppServ\www\gdms\application/../template/student\public\left.html";i:1519376538;s:70:"G:\AppServ\www\gdms\application/../template/student\public\footer.html";i:1519279161;s:66:"G:\AppServ\www\gdms\application/../template/student\public\js.html";i:1512299499;}*/ ?>
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
                    <i class="icon-th-large"></i>
                    设置
                </h1>


                <div class="row">

                    <div class="span9">

                        <div class="widget">

                            <div class="widget-header">
                                <h3>设置</h3>
                            </div> <!-- /widget-header -->

                            <div class="widget-content">


                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#1" data-toggle="tab">个人信息</a>
                                        </li>
                                        <li class=""><a href="#3" data-toggle="tab">联系方式</a></li>
                                        <li class=""><a href="#2" data-toggle="tab">修改密码</a></li>

                                    </ul>

                                    <br>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="1">
                                            <form id="edit-profile" class="form-horizontal" action="<?php echo url('student/user/change_major'); ?>" method="post">
                                                <fieldset>

                                                    <div class="control-group">
                                                        <label class="control-label" for="number">学号</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-medium disabled"
                                                                   id="number" value="<?php echo $user['number']; ?>" disabled="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->

                                                    <div class="control-group">
                                                        <label class="control-label" for="username">姓名</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-medium disabled"
                                                                   id="username" value="<?php echo $user['name']; ?>" disabled="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->
                                                    <?php if(($user['major'] != null) and ($user['department'] != null)): ?>
                                                    <div class="control-group">
                                                        <label class="control-label" for="major">系别</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-medium disabled"
                                                                   id="major" value="<?php echo get_major_name($user['major']); ?>" disabled="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->
                                                    <div class="control-group">
                                                        <label class="control-label" for="department">专业</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-medium disabled"
                                                                   id="department" value="<?php echo get_department_name($user['department']); ?>" disabled="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->
                                                    <?php else: ?>
                                                    <div class="control-group">
                                                        <label class="control-label" for="major">系别</label>
                                                        <div class="controls">
                                                            <select type="text" class="input-medium" name="major"id="major" >
                                                                <option value="0">请选择</option>
                                                                <?php if(is_array($major) || $major instanceof \think\Collection || $major instanceof \think\Paginator): if( count($major)==0 ) : echo "" ;else: foreach($major as $key=>$vo): ?>
                                                                <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>

                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->
                                                    <div class="control-group">
                                                        <label class="control-label" for="department">专业</label>
                                                        <div class="controls">
                                                            <select type="text" class="input-medium "name="department"id="department" >
                                                                <option value="0">请选择</option>
                                                            </select>
                                                            <p style="color:red;">专业和系别提交后不能修改</p>
                                                        </div> <!-- /controls -->

                                                    </div> <!-- /control-group -->

                                                    <script>
                                                        $(function () {
                                                            $("#submit").click(function () {
                                                                var major= $("#major").val();
                                                                var department= $("#department").val();
                                                                if(major==0||department==0){
                                                                    alert('系别或专业不能为空')
                                                                    return false
                                                                }
                                                            })
                                                            $("#major").change(function () {
                                                                var parent_id=$(this).val();
                                                                $.ajax({
                                                                    type: "POST",  //提交方式
                                                                    url: "<?php echo url('student/user/ajax_department'); ?>",//路径
                                                                    data:{parent_id:parent_id},
                                                                    dataType: 'html',
                                                                    success: function (data) {
                                                                        $("#department").html('');
                                                                        $("#department").append(data);
                                                                    }
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    <div class="form-actions">
                                                        <input type="submit" id="submit" class="btn btn-primary"value="提交">
                                                    </div>
                                                    <?php endif; ?>


                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="2">
                                            <form id="edit-profile2" class="form-horizontal" method="post" action="<?php echo url('student/user/password'); ?>">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <label class="control-label" for="password">原密码</label>
                                                        <div class="controls">
                                                            <input type="password" name="password"id="password"class="input-medium" id="password"
                                                                   value="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->

                                                    <div class="control-group">
                                                        <label class="control-label" for="password1">新密码</label>
                                                        <div class="controls">
                                                            <input type="password" name="password1"class="input-medium" id="password1"
                                                                   value="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->

                                                    <div class="control-group">
                                                        <label class="control-label" for="password2">确认密码</label>
                                                        <div class="controls">
                                                            <input type="password"name="password2" id="password2" class="input-medium" id="password2"
                                                                   value="">
                                                        </div> <!-- /controls -->
                                                    </div> <!-- /control-group -->

                                                    <div class="form-actions">
                                                        <input type="submit" id="password_submit" class="btn btn-primary"value="提交">
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('#password_submit').click(function () {
                                                    var password=$('#password').val();
                                                    var password1=$('#password1').val();
                                                    var password2=$('#password2').val();
                                                    if (password==''||password1==''||password2==''){
                                                        alert('密码不能为空');
                                                        return false;
                                                    }
                                                    if (password1!=password2){
                                                        alert('两次密码不一致');
                                                        return false;
                                                    }
                                                })
                                            })
                                        </script>

                                        <div class="tab-pane" id="3">
                                            <form id="edit-profile3" action="<?php echo url('student/user/contact'); ?>" method="post" class="form-horizontal">
                                                <fieldset>

                                                    <div class="control-group">
                                                        <label class="control-label" for="phone">电话</label>
                                                        <div class="controls">
                                                            <input type="text" name="phone" class="input-large" id="phone" value="<?php echo $user['phone']; ?>">
                                                        </div> <!-- /controls -->
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="qq">QQ</label>
                                                        <div class="controls">
                                                            <input type="text" name="qq"class="input-large" id="qq"
                                                                   value="<?php echo $user['qq']; ?>">
                                                        </div> <!-- /controls -->
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="wechat">微信号</label>
                                                        <div class="controls">
                                                            <input type="text" name="wechat"  class="input-large" id="wechat"
                                                                   value="<?php echo $user['wechat']; ?>">
                                                        </div> <!-- /controls -->
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="email">邮箱</label>
                                                        <div class="controls">
                                                            <input type="email"name="email"   class="input-large" id="email" value="<?php echo $user['email']; ?>">
                                                        </div> <!-- /controls -->
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="address">地址</label>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="input-large" id="address" value="<?php echo $user['address']; ?>">
                                                        </div> <!-- /controls -->
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary">提交</button>

                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>


                                </div>

                                </div>


                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->

                    </div> <!-- /span9 -->

                </div> <!-- /row -->


            </div>


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
