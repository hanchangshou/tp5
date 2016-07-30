<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\wamp\www\tp5\public/../application/admin\view\admin\list.html";i:1469610390;s:60:"D:\wamp\www\tp5\public/../application/admin\view\layout.html";i:1469600239;s:60:"D:\wamp\www\tp5\public/../application/admin\view\header.html";i:1469528671;s:60:"D:\wamp\www\tp5\public/../application/admin\view\footer.html";i:1469582175;}*/ ?>
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
 <script src="/static/js/jquery.min.js"></script>
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

 <style>
.vo_list{width:1000px;}
.vo_list input{width:100px;}
</style>
<div class="continer">
	<form method="POST" action="/admin/admin/register">
	<ul class="vo_list">
		<li class="tab-head">
			<span style="width:40px;">序号</span>
			<span>用户名</span>
			<span>所属角色</span>
			<span>最后登录IP</span>
			<span>最后登录时间</span>
			<span>E-mail</span>
			<span>真实姓名</span>
			<span style="width:130px;">管理操作</span>
		</li>
		<?php if(is_array($volist) || $volist instanceof \think\Collection): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li>
				<span><?php echo $vo['userid']; ?></span>
				<span><?php echo $vo['username']; ?></span>
				<span><?php echo $vo['roleid']; ?></span>
				<span><?php echo $vo['lastloginip']; ?></span>
				<span><?php echo $vo['lastlogintime']; ?></span>
				<span><?php echo $vo['email']; ?></span>
				<span><?php echo $vo['realname']; ?></span>
				<span><a href="">修改</a>|<a href="">删除</a>|<a href="">口令卡</a></span>
			</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		<li id="js_addadmin" style="display: none;">
			<span></span>
			<span><input type="test" name="username" placeholder="用户名" /></span>
			<span>
				<select name="roleid">
					<?php if(is_array($role) || $role instanceof \think\Collection): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['roleid']; ?>"><?php echo $vo['rolename']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</span>
			<span><input name="password" type="password" placeholder="管理员密码" /></span>
			<span><input type="password" name="rpassword" placeholder="确认密码" /></span>
			<span><input type="test" name="email" placeholder="E-mail" /></span>
			<span><input name="realname" placeholder="真实姓名" /></span>
			<span style="width:130px;"><input type="submit"  name="submit" value="提交" /></span>
		</li>

	</ul>
	<input type="button" value="增加一个" id="js_btn_showadd" class="ui-btn">
	</form>
	<p></p>
</div>
<script>
	 function get(id){
		 return document.getElementById(id);
	 }

	 get('js_btn_showadd').onclick = function ()
		{
			get('js_addadmin').style.display = "table-row";
		}
</script>
<div class="footer"">
	<p>版本ThinkPhp5.0 开发测试系统</p>
</div>

</body>
</html>