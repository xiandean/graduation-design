<?php /* Smarty version 2.6.29, created on 2016-03-19 22:08:00
         compiled from admin/n_edit.tpl */ ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>编辑公告</title>
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
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/sideBar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="rightpart">
        <div class="breadpiece">
            <a href="index.php">首页</a><span> > </span><a href="n_list.php">公告列表</a><span> > </span><a class="on">编辑公告</a>
        </div>
        <form action="n_edit.php?id=<?php echo $this->_tpl_vars['a']['a_id']; ?>
" method="post">
        <div class="note" style="padding-top:20px;">
            <div class="form-row clearfix">
                <span class="tt">标题</span>
                <input type="text" value="<?php echo $this->_tpl_vars['a']['title']; ?>
" name="title" class="title-text"/>
            </div>
            <div class="form-row clearfix">
                <span class="tt">内容</span>
                <textarea class="ipt-text" name="content"><?php echo $this->_tpl_vars['a']['context']; ?>
</textarea> 
            </div>
            <div class="form-row clearfix" style="padding-left:150px;">
                <input type="submit" class="act-btn" id="submit" value="修改"/>
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
<script type="text/javascript" src="../common/templates/admin/js/n_edit.js"></script>

</body>

</html>