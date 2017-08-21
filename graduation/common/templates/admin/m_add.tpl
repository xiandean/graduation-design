<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>新增管理员</title>
<link rel="stylesheet" href="../common/templates/admin/css/mstyle.css">

</head>

<body>
<div class="wrapper clearfix">
	<div class="topbar">
    	<div class="wrapper" style="padding-left:10px;">
			<div class="logo"> </div>
        	<h1>管理中心</h1>
    	</div>
	</div>
	<!-- 左侧导航 -->
    {include file="admin/sideBar.tpl"}
	<div class="rightpart">
		<div class="breadpiece">
			<a href="index.php">首页</a><span> > </span><a href="m_list.php">管理员管理</a><span> > </span><a class="on">新增管理员</a>
		</div>
		<div class="mCenter-follow mcenter-set" style="padding-top:15px;">
                <form id="form" action="../common/uploadImg.php?type=headIcon" method="post"  enctype="multipart/form-data" target="frame">
                    <p style="display:none;"><input type="file" name="file"  id="upload_file"></p>
                </form>
				<form id="form2" method="post" action='checkRegist.php'>
					<div class="form-row clearfix">
                        <span class="tt"><em>*</em> 账户名</span>
                        <input type="text" name="name" class="ipt-text" placeholder="请输入账号名" value="">
                    </div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 密码</span>
						<input type="password" name="password" class="ipt-text" placeholder="请输入密码">
					</div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 确认密码</span>
						<input type="password" name="password2" class="ipt-text" placeholder="请再次输入密码">
					</div>

					<div class="form-row clearfix">
						<span class="tt">上传头像</span>
						<div class="avatar">
                            <input type="hidden" name="imgpath" value="">
							<img class="fl" id="msg" src="../common/templates/images/avatar_default.jpg" alt="">
							<p>
								<span>建议头像尺寸200*200，格式支持Jpg，图片大小不得超过1M</span>
								<a href="javascript:;" class="avatar_upload">修改头像</a>
							</p>
						</div>
					</div>


					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 手机号</span>
						<input type="text" name="phone" class="ipt-text" placeholder="" value="">
					</div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 邮箱</span>
						<input type="text" name="email" class="ipt-text" placeholder="" value="">
					</div>
					<div class="form-row clearfix">
						<span class="tt">所在地址</span>
						<input type="text" name="address" class="ipt-text" placeholder="广东  广州" value="">
					</div>
					
					

					<div class="form-row clearfix">
						<span class="tt"></span>
						<input type="submit" class="submit" value="新增">
                        <input type="reset" class="reset" value="重置">
					</div>

				</form>
			    
			</div>
	</div>

</div>
<!--页脚-->
<div class="footer">
	<div class="copyright">
        <div class="wrapper">
            版权所有 盗版必究
        </div>
	</div>
</div>
<!--页脚-->
<script type="text/javascript" src="../common/templates/admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/admin/js/m_add.js"></script>
</body>

</html>