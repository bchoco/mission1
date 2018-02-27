<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>后台登录</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="/Public/Admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="/Public/Admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
<link href="/Public/Admin/css/animate.css" rel="stylesheet">
<link href="/Public/Admin/css/style.css?v=4.1.0" rel="stylesheet">
<!--[if lt IE 9]>
	<meta http-equiv="refresh" content="0;ie.html" />
<![endif]-->
<script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">
<div class="middle-box text-center loginscreen  animated fadeInDown">
  <div>
    <div>
      <h1 class="logo-name">H+</h1>
    </div>
    <h3>Welcom!</h3>
    <form class="m-t" role="form" action="<?php echo U('Public/check');?>" method="post">
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="用户名" required="">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="密码" required="">
      </div>
      <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
      <p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a> </p>
    </form>
  </div>
</div>

<!-- 全局js --> 
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script> 
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script> 

</body>
</html>