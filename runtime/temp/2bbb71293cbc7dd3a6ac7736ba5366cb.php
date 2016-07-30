<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\index\index.html";i:1469848778;s:60:"D:\wamp\www\tp5\public/../application/admin\view\layout.html";i:1469847208;s:60:"D:\wamp\www\tp5\public/../application/admin\view\header.html";i:1469528671;s:60:"D:\wamp\www\tp5\public/../application/admin\view\footer.html";i:1469582175;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style type="text/css">
*{margin:0;padding:0;color:#333333;font-size:14px;}
a{text-decoration: none;color:#333333;}
li{ list-style:none;}
.header{height:80px; position:relative;line-height:80px;}
.header .logo h1{font-size:40px;font-weight:bold;margin:0 80px;}
.header .aside{position:absolute;right:40px;top:24px;}
.nav{width:100%;height:40px;border:solid 1px #eeeeee;border-left:none;border-right:none;}
.nav li{float:left;line-height:40px;margin:0 20px;font-size:14px;}
.footer{border-top:solid 1px #eeeeee;height:80px;}
.footer p{text-align:center;line-height:80px;color:#666666;font-size:14px;}
.ui-btn{border:solid 1px #dddddd;padding:8px 10px; cursor:pointer;border-radius:4px;outline:none;}
.continer{margin:0 auto 20px;width:1000px;}

.vo_list{ width:590px;height:20px; line-height:20px; border:1px solid #99CC00;font-size:14px; display: table;margin:20px auto;}
.vo_list li{display: table-row;}
.vo_list li span{border:solid 1px #eee;padding:4px 10px;display:table-cell;}
.tab-head{background:#eee;font-weight:bold;}
.page a{border:solid 1px #eee;padding:8px 12px;display:inline-block;margin:20px 20px 0 0;}
 .a{background: no-repeat;}
</style>
<link type="text/css" rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="/static/bootstrap/css/bootstrap-theme.min.css">
<script src="/static/jquery/1.11.3/jquery.min.js"></script>
<script src="/static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
	<div class="logo"><h1>孔繁荣系统</h1></div>
	<p class="aside"><a href="/admin/admin/logout">退出登陆</a></p>
</div>
<div class="nav">
	<ul>
		<li><a href="/admin/index/index">栏目管理</a></li>
		<li><a href="/admin/admin/adminlist">会员管理</a></li>
	</ul>
</div>

 <div class="continer">
<ul class="vo_list">
	<li style="display: table-caption;text-align: center;font-weight:bold;line-height:40px;">列表数据</li>
	<li>
		<span style="width:60px;"><input type="checkbox" /> 全选</span>
		<span>ID</span>
		<span>父栏目ID</span>
		<span>栏目名称</span>
		<span style="width:96px;">操作</span>
	</li>
	<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li>
			<span><input type="checkbox" /></span>
			<span><?php echo $vo['catid']; ?></span>
			<span><?php echo $vo['parentid']; ?></span>
			<span><a href=""><?php echo $vo['catname']; ?></a></span>
			<span><a href="">修改</a> <a href="">删除</a></span>
		</li>			
	<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
	<nav>
		<ul class="pagination pagination-lg">
			<li>
				<a href="/admin/index/index/page/<?php echo $previou; ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<?php $__FOR_START_5964__=0;$__FOR_END_5964__=$maxSize;for($i=$__FOR_START_5964__;$i < $__FOR_END_5964__;$i+=1){ if($page == $i): ?>
					<li class="active"><a><?php echo $i+1; ?></a></li>
				<?php else: ?>
					<li><a href="/admin/index/index/page/<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
				<?php endif; } ?>
			<li>
				<a href="/admin/index/index/page/<?php echo $next; ?>" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
<!--<p class="page"><a href="/admin/index/index/page/<?php echo $previou; ?>">上一页</a><a href="/admin/index/index/page/<?php echo $next; ?>">下一页</a></p>-->
</div>

<div class="footer"">
	<p>版本ThinkPhp5.0 开发测试系统</p>
</div>

</body>
</html>