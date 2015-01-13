<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>朱珠与呵呵 后台管理</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/Zblog/Public/Admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/Zblog/Public/Admin/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="/Zblog/Public/Admin/css/fullcalendar.css" />	
		<link rel="stylesheet" href="/Zblog/Public/Admin/css/unicorn.main.css" />
		<link rel="stylesheet" href="/Zblog/Public/Admin/css/unicorn.grey.css" class="skin-color" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<script type="text/javascript" charset="utf-8" src="/Zblog/Public/Admin/js/jquery.min.js">
		</script>
	<body>
		<!--头部开始-->
		<div id="header">
			<h1><a href="">朱珠与呵呵</a></h1>		
		</div>
		
		<div id="search">
			<input type="text" placeholder="Search here..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
        <!--头部结束--> 
 <!--菜单开始-->  
		<div id="sidebar">
			<a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
			<ul>
				<li class="active"><a href="/zyf/admin.php"><i class="icon icon-home"></i> <span>后台主页</span></a></li>
				<li class="submenu">
					<a href="#"><i class="icon icon-th-list"></i> <span>文章管理</span> <span class="label">3</span></a>
					<ul>
						<li><a href="/Zblog/index.php/Admin/Article/index">文章列表</a></li>
						<li><a href="/Zblog/index.php/Admin/Article/add">添加文章</a></li>
						<li><a href="/Zblog/index.php/Admin/Article/tags">标签管理</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="icon icon-file"></i> <span>标签管理</span> <span class="label">2</span></a>
					<ul>
						<li><a href="/Zblog/index.php/Admin/Tags/index">标签列表</a></li>
						<li><a href="/Zblog/index.php/Admin/Tags/add">添加标签</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#"><i class="icon icon-file"></i> <span>文章分类</span> <span class="label">2</span></a>
					<ul>
						<li><a href="/Zblog/index.php/Admin/invoice.html">分类列表</a></li>
						<li><a href="/Zblog/index.php/Admin/chat.html">添加分类</a></li>
					</ul>
				</li>
				<li><a href="interface.html"><i class="icon icon-pencil"></i> <span>信息管理</span></a></li>
				<li><a href="tables.html"><i class="icon icon-th"></i> <span>友情链接</span></a></li>
				<li><a href="grid.html"><i class="icon icon-th-list"></i> <span>滚动图片</span></a></li>
			</ul>
		
		</div>
		<!--菜单结束-->

		<!--颜色选择-->
		<!--
		<div id="style-switcher">
			<i class="icon-arrow-left icon-white"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
		</div>
		-->
		<!--颜色选择结束-->

<script type="text/javascript" charset="utf-8" src="/Zblog/Public/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Zblog/Public/Admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Zblog/Public/Admin/ueditor/lang/zh-cn/zh-cn.js"></script>


<script src="/Zblog/Public/Admin/js/jquery.min.js" type="text/javascript"></script>
<script src="/Zblog/Public/Admin/multiselect/select2.js" type="text/javascript"></script>
<script src="/Zblog/Public/Admin/multiselect/jquery.multiSelect.js" type="text/javascript"></script>

<link href="/Zblog/Public/Admin/multiselect/select2.css" rel="stylesheet" type="text/css" />


<style type="text/css">
    .clear {
        clear: both;
    }
</style>

<div id="content">
	<!--<div id="content-header">
		<h1>添加文章</h1>
		<div class="btn-group">
			<a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>

			<a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
			<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
			<a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
		</div>
	</div>-->
	<div id="breadcrumb">
		<a href="#" title="Go to Home" class="tip-bottom" style="font-size:14px;font-weight:bold"><i class="icon-home"></i> 首页</a>
		<a class="tip-bottom" href="#" data-original-title="">文章管理</a>
		<a class="current" href="#">添加文章</a>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>									
						</span>
						<h5>添加文章</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="" method="post" class="form-horizontal" />
							<div class="control-group">
								<label class="control-label">文章标题</label>
								<div class="controls">
									<input type="text" placeholder="文章标题。。。" name="name"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">文章分类</label>
								<div class="controls">
									<select name="category">

										<option id=""/>First option
										<option id=""/>Second option
										<option id=""/>Third option
										<option id=""/>Fourth option
										<option id=""/>Fifth option
										<option id=""/>Sixth option
										<option id=""/>Seventh option
										<option id=""/>Eighth option
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">文章摘要</label>
								<div class="controls">
									<input type="text" placeholder="文章摘要。。。" name="summary"/>
								</div>
							</div>
							<script type="text/javascript">
			
								$(document).ready( 	function(){

									  $("#mySel2").select2({
									    closeOnSelect:false,
									    placeholder: "选择标签",

									  });
									  
									});
								
							</script>
							<style>
								.select2-drop{z-index:1000 !important;}
							</style>
							
							<div class="control-group">
								<label class="control-label">标签选择</label>
								<div class="controls">
									<select id="mySel2" class="select2" multiple="multiple" name="tags[] " style="width:400px;z-index:1000">
										<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									   
									</select>

								</div>
							</div>
							<div class="control-group">
								<label class="control-label">文章内容</label>
								<div class="controls">
									 <script id="editor" type="text/plain" name="content" style="width:700px;height:400px;">
									 </script>
									
								</div>
							</div>
							<script>
								UE.getEditor('editor');
							</script>

							<div class="form-actions" style="padding-left:450px">
								<button type="submit" class="btn btn-primary">保存</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button  class="btn btn-primary edui-box edui-icon edui-default">预览</button>
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>			
</div>
	
 		<script>
            $(function(){
                $("#sidebar > ul > li.active > a").click(function(){
                    $(this).addClass("a_chose");

                })
            })

        </script>

        <script src="/Zblog/Public/Admin/js/excanvas.min.js"></script>
        <script src="/Zblog/Public/Admin/js/jquery.ui.custom.js"></script>
        <script src="/Zblog/Public/Admin/js/bootstrap.min.js"></script>
        <script src="/Zblog/Public/Admin/js/jquery.flot.min.js"></script>
        <script src="/Zblog/Public/Admin/js/jquery.flot.resize.min.js"></script>
        <script src="/Zblog/Public/Admin/js/jquery.peity.min.js"></script>
        <script src="/Zblog/Public/Admin/js/fullcalendar.min.js"></script>
        <script src="/Zblog/Public/Admin/js/unicorn.js"></script>
        <script src="/Zblog/Public/Admin/js/unicorn.dashboard.js"></script>


    </body>
</html>