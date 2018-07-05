<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"G:\AppServ\www\gdms\application/../template/teacher\login\index.html";i:1513437755;s:68:"G:\AppServ\www\gdms\application/../template/teacher\public\link.html";i:1514994769;s:70:"G:\AppServ\www\gdms\application/../template/teacher\public\header.html";i:1518845126;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>毕业设计管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />


	  <link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="/static/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia.css" />
<link rel="stylesheet" type="text/css" href="/static/css/adminia-responsive.css" />



	  <link rel="stylesheet" type="text/css" href="/static/css/pages/login.css" />

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



<div id="login-container">
	
	
	<div id="login-header">
		
		<h3>老师登录</h3>
		
	</div> <!-- /login-header -->
	
	<div id="login-content" class="clearfix">
	
	<form action="do_login" method="post"/>
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="student_number">学号</label>
						<div class="controls">
							<input type="text" class=""name="number" id="student_number" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">密码</label>
						<div class="controls">
							<input type="password" name="password"class="" id="password" />
						</div>
					</div>
				</fieldset>
				
				<!--<div id="remember-me" class="pull-left">
					<input type="checkbox" name="remember" id="remember" />
					<label id="remember-label" for="remember">Remember Me</label>
				</div>-->
				
				<div class="pull-right">
					<button type="submit" class="btn btn-warning btn-large">
						登录
					</button>
				</div>
		<div class="pull-left">
			<a href="/student/login"style="float:left;" target="_blank">我是学生</a>
		</div>
			</form>
			
		</div> <!-- /login-content -->
		
		
		<div id="login-extra">
			
			<p>忘记密码? <a href="javascript:;">请拿学生证到网络中心.</a></p>

		</div> <!-- /login-extra -->
	
</div> <!-- /login-wrapper -->

    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->



  </body>
</html>
