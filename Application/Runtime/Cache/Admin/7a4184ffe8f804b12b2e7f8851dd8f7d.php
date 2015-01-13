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

<div id="content">
	<div id="breadcrumb">
		<a href="#" title="Go to Home" class="tip-bottom" style="font-size:14px;font-weight:bold"><i class="icon-home"></i> 首页</a>
		<a class="tip-bottom" href="#" data-original-title="">文章管理</a>
		<a class="current" href="#">文章列表</a>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>									
						</span>
						<h5>文章列表</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>文章编号</th>
									<th>文章标题</th>
									<th>文章标签</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["name"]); ?></td>
									<td><?php echo ($vo["publish"]); ?></td>
									<td><a href="">编辑</a> &nbsp;<a href="">删除</a> </td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
							
							</tbody>

						</table>

					</div>
					<?php echo ($page); ?>				
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