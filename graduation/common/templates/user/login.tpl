<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>用户登陆</title>
<link rel="stylesheet" href="../common/templates/user/css/style.css">

</head>
<body>
                            
<!-- 页面导航 -->
{include file="user/topBar.tpl"}
<!-- /页面导航 -->
<div class="uCenter-bar">
    <div class="wrapper">
        <h1>用户登陆</h1>
    </div>
</div>
<div class="section uCenter">
	<div class="wrapper clearfix">
	   
		<div class="uCenter-content">
			<div class="uCenter-follow ucenter-set">
				<form method="post" action='checkLogin.php'>
					<div class="form-row clearfix">
                        <span class="tt"><em>*</em> 用户名</span>
                        <input type="text" name="name" class="ipt-text" placeholder="请输入用户名">
                    </div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 密码</span>
						<input type="password" name="password" class="ipt-text" placeholder="请输入密码">
					</div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 验证码</span>
						<input type="text" name="code" style="width:80px;" class="ipt-text" placeholder="请输入验证码">
						<img style="display:inline; vertical-align:middle;" src="" id="imgcode"><a href="javascript:;" id="reCode" style="margin-left:6px;">换一张</a>
					</div>
					<div class="form-row clearfix"><input type="checkbox" checked="checked" name="auto" class="tip" />自动登陆<!-- <a class="forget" href="" target="_blank">忘记密码？</a> --></div>
					

					<div class="form-row clearfix">
						<span class="tt"></span>
						<input type="submit" class="submit" value="登陆">
                        <a class="reset" href="regist.php">注册</a>
					</div>

				</form>
			    
			</div>
			
		</div>		
	</div>
</div>

<!-- 页面导航 -->
{include file="user/footBar.tpl"}
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/login.js"></script>




</body>
</html>