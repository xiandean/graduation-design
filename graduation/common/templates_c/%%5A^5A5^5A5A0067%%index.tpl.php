<?php /* Smarty version 2.6.29, created on 2016-03-14 14:25:33
         compiled from admin/index.tpl */ ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>管理员首页</title>
<link rel="stylesheet" href="../common/templates/admin/css/mstyle.css">

</head>
<body>
                            


<!--管理员首页-->
<div class="mCenter-bar topbar">
    <div class="wrapper">
        <div class="logo"> </div>
        <h1>管理中心</h1>
    </div>
</div>
<div class="section mCenter">
    <div class="wrapper clearfix">
    	
		<div class="breadpiece">
			管理员 <a href="m_edit.php" target="_blank"><?php echo $this->_tpl_vars['mname']; ?>
</a>，欢迎登陆！
		</div>
		<div class="indexcontent" style="background-color:#36dda0";>
			<a href="m_list.php" target="_blank">
			<img src="../common/templates/images/admin-group.png" >
			<div class="fn-info">
			 <h1>管理员管理</h1>
			 <div class="text">支持对当前管理员信息的修改，对现有管理员的查看，及管理员账户的查看、新增和删除操作</div>
			</div>
			</a> 
    	</div>
		<div class="indexcontent" style="background-color:#36dda0";>
			<a href="u_list.php" target="_blank">
			<img src="../common/templates/images/user-group.png">
			<div class="fn-info">
			 <h1>用户管理</h1>
			 <div class="text">支持对当前用户信息的查看、编辑和删除操作</div>
			</div>
			</a>   
    	</div>  
		<div class="indexcontent" style="background-color: #FF80C0;">
			<a href="list.php" target="_blank">
			<img src="../common/templates/images/notice-group.png">
			<div class="fn-info">
			 <h1>启事管理</h1>
			 <div class="text">支持对启事信息的查看，编辑和删除操作</div>
			</div> 
			</a>  
    	</div>        
		<div class="indexcontent">
			<a href="pull_list.php" target="_blank">
			<div class="sub-fn" style="background-color:#FF80C0;">
				<img  style="height:40px; width:60px; margin-left:40px; margin-top:5px;" src="../common/templates/images/match-group.png">
				<div class="fnname">
			 		<h2>匹配推送</h2>
			 	</div>
				</a>
			</div> 
			<a href="a_list.php" target="_blank">
			<div class="sub-fn" style="background-color:#FF80C0;">
				<img  style="height:40px; width:40px; margin-left:50px; margin-top:5px;" src="../common/templates/images/answer-group.png">
				<div class="fnname">
			 		<h2>验证管理</h2>
			 	</div>
			</div> 
			</a>    
    	</div>
		<div class="indexcontent" style="background-color:#bfa882;">
			<a href="n_list.php" target="_blank">
			<img src="../common/templates/images/announce-group.png">
			<div class="fn-info">
			 <h1>公告管理</h1>
			 <div class="text">支持对公告的查看，编辑和删除操作</div>
			</div> 
			</a>  
    	</div>
		<div class="indexcontent" style="margin-top:0;">
			<a href="leave_list.php" target="_blank">
			<div class="sub-fn" style="background-color:#fff;">
				<img  style="height:40px; width:40px; margin-left:40px; margin-top:5px;" src="../common/templates/images/message.png">
				<div class="fnname2">
			 		<h2>留言管理</h2>
			 	</div>
			</div>
			</a>
			<a href="t_list.php" target="_blank"> 
			<div class="sub-fn" style="background-color:#fff;">
				<img  style="height:40px; width:40px; margin-left:40px; margin-top:5px;" src="../common/templates/images/message.png">
				<div class="fnname2">
			 		<h2>感谢信管理</h2>
			 	</div>
			</div> 
			</a>
			<a href="rl_list.php" target="_blank">
			<div class="sub-fn" style="background-color:#fff;">
				<img  style="height:40px; width:40px; margin-left:40px; margin-top:5px;" src="../common/templates/images/message.png">
				<div class="fnname2">
			 		<h2>认领记录</h2>
			 	</div>
			</div>
			</a>         
    	</div>
			  
    </div>
</div>

<!--管理员首页-->

<!--页脚-->
<div class="footer">
	<div class="copyright">
        <div class="wrapper">
            版权所有 盗版必究
        </div>
	</div>
</div>
<!--页脚-->
<!-- <script type="text/javascript" src="../common/templates/admin/js/jquery-1.7.2.min.js"></script> -->



</body>
</html>