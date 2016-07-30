<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\wamp\www\tp5\public/../application/index\view\index\add.html";i:1468908148;s:65:"D:\wamp\www\tp5\public/../application/index\view\\index\base.html";i:1468578688;}*/ ?>
﻿<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
</head>
<body>
<p><a href="/">连接列表</a></p>
左边分栏

<form action="/index/index/add" method="POST">
	<input type="text" name="name" /><br/>
	<input type="text" name="url" /><br/>
	<input type="radio" name="linktype" value="1" />图片 <input type="radio" name="linktype" value="0" checked />文字<br/>
	<input type="submit" value="提交" />
</form>
<p style="color:#ff0000"><?php echo $error; ?></p>

<form action="/index/index/upload" enctype="multipart/form-data" method="post">
	<input type="file" name="image" /> <br> 
	<input type="submit" value="上传" /> 
</form> 


右边分栏
底部
</body>
</html>