<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\tp5\public/../application/admin\view\admin\login.html";i:1469602496;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>登 录</title>
</head>
    <style>
        *{margin:0;padding:0;font-size:100%; font-family: "Microsoft Yahei", "Helvetica Neue", Helvetica, Arial, sans-serif;}
        .login{margin:200px auto;padding:15px;border:solid 1px #eeeeee;width:242px;}
        h1{text-align:center;font-size:30px;}
        .ui-input{border:solid 1px #dddddd;height:30px;width:230px;margin:15px 0;display:block;padding-left:10px;}
        .ui-btn{margin:5px 15px 0 0;border:solid 1px #dddddd;padding:4px 8px;outline: none; cursor:pointer;}
    </style>
<body>
    <div class="login">
        <h1>登 录</h1>
        <form action="/admin/admin/login" method="POST">
        <input type=text name=username  class="ui-input" placeholder="输入用户名" value="<?php echo isset($username) ? $username : ''; ?>" />
        <input type=password name=password class="ui-input" placeholder="输入密码" value="<?php echo isset($password) ? $password : ''; ?>" />
        <p style="color:#ff0000;font-size:14px;"><?php echo $errMsg; ?></p>
        <input type=submit value='登陆' name="submit" class="ui-btn" /><input type='button' value='注册' class="ui-btn" />
    </form>
    </div>

</body>
</html>