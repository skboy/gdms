<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:70:"G:\AppServ\www\gdms\application/../template/teacher\notice\detail.html";i:1515324971;s:68:"G:\AppServ\www\gdms\application/../template/teacher\public\link.html";i:1514994769;s:70:"G:\AppServ\www\gdms\application/../template/teacher\public\header.html";i:1518845126;s:68:"G:\AppServ\www\gdms\application/../template/teacher\public\left.html";i:1519013911;s:70:"G:\AppServ\www\gdms\application/../template/teacher\public\footer.html";i:1514995332;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>添加论文题目</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
	  <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia-responsive.css" />



	  <link rel="stylesheet" type="text/css" href="/static/css/pages/plans.css" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	  <style>
		  select{
			  width: auto;
			  padding-left: 27%;
			  margin: 0;
		  }

		  option{

			  text-align:center;

		  }
		.controls p{
			margin-top: 4px;
		}
		.control-label{font-size: 14px}
	  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

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

            <span class="account-actions">
						<a href="javascript:;"><?php echo get_major_name($user['major']); ?></a>	 |
							
						<a href="javascript:;"><?php echo get_department_name($user['department']); ?></a>
						</span>

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

        <li class="<?php if(($action == "setting")): ?>active<?php endif; ?>">
            <a href="<?php echo url('/teacher/setting'); ?>">
                <i class="icon-cog"></i>
                设置
            </a>
        </li>

    </ul>

    <hr />

    <div class="sidebar-extra">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
    </div> <!-- .sidebar-extra -->

    <br />

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
					管理公告
				</h1>
				
				
				<div class="row">
					
					<div class="span9">
				
						<div class="widget">
							
							<div class="widget-header">
								<h3>公告信息</h3>
							</div> <!-- /widget-header -->
									
							<div class="widget-content">
								
								
								
								<div class="tabbable">
						
						<br />
						
							<div class="tab-content">
								<div class="tab-pane active" id="1">
								<form id="edit-profile" class="form-horizontal" method="post"/>
									<fieldset>
										<input type="hidden" name="article_id" value="<?php if(isset($article)): ?><?php echo $article['article_id']; endif; ?>">
										<div class="control-group">											
											<label class="control-label">标题:</label>
											<div class="controls">
												<p><?php echo $notice['title']; ?></p>
											</div> <!-- /controls -->

										</div> <!-- /control-group -->


										<div class="control-group">
											<label class="control-label">内容:</label>
											<div class="controls">
												<?php echo $notice['content']; ?>
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
									</fieldset>
								</form>
								</div>

								
							</div>

						</div>
							</div> <!-- /widget-content -->
							
						</div> <!-- /widget -->
						
					</div> <!-- /span9 -->
					
				</div> <!-- /row -->

			</div> <!-- /span9 -->
			
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /content -->


<div  style=" /*position:fixed; bottom:0;*/width: 100%">

    <div class="container">
        <hr />
        <p style="text-align: center">&copy; 2012 Go Ideate.</p>
    </div> <!-- /container -->

</div> <!-- /footer -->


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.js"></script>

  </body>
</html>
