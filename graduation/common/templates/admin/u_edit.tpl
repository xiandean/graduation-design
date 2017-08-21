<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>编辑用户</title>
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
            <a href="index.php">首页</a><span> > </span><a href="u_list.php">用户列表</a><span> > </span><a class="on">编辑用户：{$u.name}</a>
        </div>
        <div class="mCenter-follow mcenter-set" style="padding-top:15px;">
        <form id="form" action="../common/uploadImg.php?type=headIcon" method="post"  enctype="multipart/form-data" target="frame">
                    <p style="display:none;"><input type="file" name="file"  id="upload_file"></p>
                </form>
                <form id="form2" method="post" action='ajaxApi/u_reset.php?uid={$u.id}'>
                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 用户名</span>
                        <input type="text" name="name" disabled="false" class="ipt-text" placeholder="请输入用户名" value="{$u.name}">
                    </div>

                    <div class="form-row clearfix">
                        <span class="tt">用户头像</span>
                        <div class="avatar">
                            <input type="hidden" name="imgpath" value="{$u.img}">
                            <img class="fl" id="msg" src="{if $u.img}{$u.img}{else} ../common/templates/images/detail_avatar.jpg {/if}" alt="">
                            <p style="display:none">
                                <span>建议头像尺寸200*200，格式支持Jpg，图片大小不得超过1M</span>
                                <a href="javascript:;" class="avatar_upload">修改头像</a>
                            </p>
                        </div>
                    </div>


                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 手机号</span>
                        <input type="text" name="phone" disabled="disabled" class="ipt-text" placeholder="" value="{$u.phone}">
                    </div>
                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 邮箱</span>
                        <input type="text" name="email" disabled="disabled" class="ipt-text" placeholder="" value="{$u.email}">
                    </div>
                    <div class="form-row clearfix">
                        <span class="tt">所在地</span>
                        <input type="text" name="address" disabled="disabled" class="ipt-text" placeholder="广东  广州" value="{$u.address}">
                    </div>
                    
                    

                    <div class="form-row clearfix">
                        <span class="tt"></span>
                        <input type="button" class="submit2" value="编辑">
                        <input style="display:none" type="submit" class="submit" value="修改">
                        <input style="display:none" type="reset" class="reset" value="取消">
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
<script type="text/javascript" src="../common/templates/admin/js/u_edit.js"></script>
</body>

</html>