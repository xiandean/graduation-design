<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>发布公告</title>
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
            <a href="index.php">首页</a><span> > </span><a href="n_list.php" target="_blank">公告管理</a><span> > </span><a class="on">发布公告</a>
        </div>
        <form action="p_note.php" method="post">
        <div class="note" style="padding-top:20px;">
            <div class="form-row clearfix">
                <span class="tt">标题</span>
                <input type="text" value="" name="title" class="title-text"/>
            </div>
            <div class="form-row clearfix">
                <span class="tt">内容</span>
                <textarea class="ipt-text" name="content"></textarea> 
            </div>
            <div class="form-row clearfix" style="padding-left:150px;">
                <input type="submit" class="act-btn" id="submit" value="发布"/>
                <input type="reset" class="act-btn" onClick="window.location.reload()" value="取消"/>
            </div>
        </div>
        </form>
        
        
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
<script type="text/javascript" src="../common/templates/admin/js/p_note.js"></script>

</body>

</html>