<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:73:"G:\AppServ\www\gdms\application/../template/teacher\article\add_edit.html";i:1519129246;s:68:"G:\AppServ\www\gdms\application/../template/teacher\public\link.html";i:1514994769;s:70:"G:\AppServ\www\gdms\application/../template/teacher\public\header.html";i:1518845126;s:68:"G:\AppServ\www\gdms\application/../template/teacher\public\left.html";i:1519378424;s:70:"G:\AppServ\www\gdms\application/../template/teacher\public\footer.html";i:1519279161;}*/ ?>
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
				添加论文
				</h1>
				
				
				<div class="row">
					
					<div class="span9">
				
						<div class="widget">
							
							<div class="widget-header">
								<h3>论文信息</h3>
							</div> <!-- /widget-header -->
									
							<div class="widget-content">
								
								
								
								<div class="tabbable">
						
						<br />
						
							<div class="tab-content">
								<div class="tab-pane active" id="1">
								<form id="edit-profile" class="form-horizontal" method="post"/>
									<fieldset>

										<div class="control-group">											
											<label class="control-label" for="category">论文分类</label>
											<div class="controls">
												<select type="text" id="category" name="category_id"style="width: 460px">
													<option value="0">请选择</option>
													<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): if( count($category)==0 ) : echo "" ;else: foreach($category as $key=>$vo): ?>
													<option value="<?php echo $vo['category_id']; ?>"<?php if(isset($article)): if($vo['category_id'] == $article['category_id']): ?>selected <?php endif; endif; ?>>
														<?php echo $vo['title']; ?>
												</option>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												</select>

											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<input type="hidden" name="article_id" value="<?php if(isset($article)): ?><?php echo $article['article_id']; endif; ?>">
										<div class="control-group">											
											<label class="control-label" for="title">论文题目</label>
											<div class="controls">
												<input type="text" class="" name="title"id="title"value="<?php if(isset($article)): ?><?php echo $article['title']; endif; ?>" style="width: 450px"/>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										<div class="control-group">
											<label class="control-label" for="describe">论文描述</label>
											<div class="controls">
												<textarea type="text" class=""id="describe" name="describe"style="width: 450px;height:100px;" ><?php if(isset($article)): ?><?php echo $article['describe']; endif; ?></textarea>
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<!--<div class="control-group">
											<label class="control-label" for="model">论文模块</label>
											<div class="controls">
												<textarea type="text" class="" name="model"id="model"style="width: 450px;height:100px;" ></textarea>
											</div> &lt;!&ndash; /controls &ndash;&gt;
										</div> &lt;!&ndash; /control-group &ndash;&gt;
										<div class="control-group">
											<label class="control-label" for="note">论文备注</label>
											<div class="controls">
												<textarea type="text" class="" name="note"id="note"style="width: 450px;height:100px;" ></textarea>
											</div>
										</div>-->
											<br />
										<script type="text/javascript" src="/static/js/ueditor.config.js"></script>
										<!-- 编辑器源码文件 -->
										<script type="text/javascript" src="/static/js/ueditor.all.min.js"></script>
										<!-- 实例化编辑器 -->
											
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">提交</button>
										</div> <!-- /form-actions -->
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
        <p style="text-align: center">&copy; 2018 毕业设计管理系统.</p>
    </div> <!-- /container -->

</div> <!-- /footer -->


    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.js"></script>
<script type="text/javascript">

    var editor;
    $(function () {
        //具体参数配置在  editor_config.js  中
        var options = {
            initialFrameHeight: 250, //初化高度
            initialFrameWidth:460,
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign'
            , //允许的最大字符数 'fullscreen',
            pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true,
            topOffset:0,
            toolbarTopOffset:0,
            scaleEnabled:true,
            toolbars: [
                [
                   'bold', 'italic', 'underline',/* 'fontborder',
                    'strikethrough', 'superscript', 'subscript',
                    'removeformat', 'formatmatch', 'autotypeset',
                    'blockquote', 'pasteplain', '|', 'forecolor',
                    'backcolor', 'insertorderedlist'*/
                  ]
            ]
        };
        editor = new UE.ui.Editor(options);
        editor.render("describe");  //  指定 textarea 的  id 为 goods_content

    });
</script>
  </body>
</html>
