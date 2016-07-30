<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\tp5\public/../application/index\view\index\index.html";i:1468895443;}*/ ?>
<?php echo $title; ?>
<table border="1">
<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
	<tr>
		<td><?php echo $data['linkid']; ?></td>
		<td><?php echo $data['url']; ?></td>
		<td><?php echo $data['name']; ?></td>
		<td><a href="/index/index/json/id/<?php echo $data['linkid']; ?>">返回json</a></td>
		<td><a href="/index/index/delete?id=<?php echo $data['linkid']; ?>">删除</a></td>
	</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
	<tr>
		<td>并不存在</td>
		<td>测试错误</td>
		<td>测试错误</td>
		<td><a href="/index/index/json/id/999">返回json</a></td>
		<td><a href="/index/index/delete?id=999">删除</a></td>
	</tr>
</table>
<input type="button" onclick="location.href='/index/index/add'" value="增加一个" />