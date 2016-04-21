<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>锐翔网 - 登录</title>
    <meta name="keywords" content="锐翔网，您身边的法律顾问">
    <meta name="description" content="锐翔网，法律援助">

    <link href="/RixCMS/App/Admin/Public/login/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/RixCMS/App/Admin/Public/login/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <link href="/RixCMS/App/Admin/Public/login/css/animate.css" rel="stylesheet">
    <link href="/RixCMS/App/Admin/Public/login/css/style.css?v=2.2.0" rel="stylesheet">
    <script type="text/javascript">
        function reImg(){
            var img = document.getElementById("code");
            img.src = "verify?rnd=" + Math.random();            
        }
    </script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">Rix</h1>
            </div>
            <h3>欢迎使用 Rix后台管理系统</h3>

            <form class="m-t" role="form" action="/RixCMS/index.php/admin/user" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" placeholder="用户名" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="passwd"  placeholder="密码" required="">
                </div>
                
                <div class="form-group">
                    <input style="width: 120px;float:left;margin-right:5px" maxlength="4" name="code" type="text" class="form-control" placeholder="验证码" required="">
                	<span>
                		<img src="<?php echo U('Admin/User/verify');?>" onclick="reImg()" id="code"   width="80" height="30"/>
                		<a href="#"  onclick="reImg()">看不清换一张</a>
                	</span>
                </div>
                
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/RixCMS/App/Admin/Public/login/js/jquery-2.1.1.min.js"></script>
    <script src="/RixCMS/App/Admin/Public/login/js/bootstrap.min.js?v=3.4.0"></script>
</body>

</html>