<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>用户中心</title>
<link rel="stylesheet" href="../common/templates/user/css/style.css">

</head>
<body>
                            
<!-- 页面导航 -->
{include file="user/topBar.tpl"}
<!-- /页面导航 -->

<div class="uCenter-bar">
    <div class="wrapper">
        <h1>个人中心</h1>
    </div>
</div>
<div class="section uCenter">
	<div class="wrapper clearfix">
	   <div class="uCenter-aside">
            <div class="uCenter-userinfo clearfix">
                <img src="{if $headImg} {$headImg} {else} ../common/templates/images/detail_avatar.jpg {/if}" alt=""></a>
                <div class="follow-info">
                    <h4>{$username}</h4>
                    <a href="exit.php"><p class="uCenter-type0">退出</p></a>
                </div>  
            </div>
            <div class="uCenter-nav">
                <ul>
                    <li class="nav3 {if $p=='user_info'||$p==''}on{/if}"><a href="ucenter.php?p=user_info">资料设置</a></li>
                    <li class="nav2 {if $p=='reset_psw'}on{/if}"><a href="ucenter.php?p=reset_psw">修改密码</a></li>
                    <li class="nav1"><a href="ucenter.php?p=list">启事管理</a></li>
                </ul>
                {if $p=='list'}
                <ul class="sub-menu">
                    <li {if $action=='pulling'||$action==''}class="on" {/if}><a href="ucenter.php?p=list&action=pulling">匹配推送</a></li>
                    <li {if $action=='working'}class="on" {/if}><a href="ucenter.php?p=list&action=working">正在发布</a></li>
                    <li {if $action=='waiting'}class="on" {/if}><a href="ucenter.php?p=list&action=waiting">等待验证</a></li>
                    <li {if $action=='records'}class="on" {/if}><a href="ucenter.php?p=list&action=records">历史记录</a></li>
                </ul>
                {/if}
            </div>

        </div>
		<div class="uCenter-content fr">
            
			<div class="uCenter-follow ucenter-set">
            {if $p=='user_info'}
                <form id="form" action="../common/uploadImg.php?type=headIcon" method="post"  enctype="multipart/form-data" target="frame">
                    <p style="display:none;"><input type="file" name="file"  id="upload_file"></p>
                </form>
				<form id="form2" method="post" action='reset_user.php'>
					<div class="form-row clearfix">
                        <span class="tt"><em>*</em> 用户名</span>
                        <input type="text" name="name" disabled="false" class="ipt-text" placeholder="请输入用户名" value="{$userinfo.name}">
                    </div>

					<div class="form-row clearfix">
						<span class="tt">我的头像</span>
						<div class="avatar">
                            <input type="hidden" name="imgpath" value="{$userinfo.img}">
							<img class="fl" id="msg" src="{if $userinfo.img} {$userinfo.img} {else} ../common/templates/images/detail_avatar.jpg {/if}" alt="">
							<p style="display:none">
								<span>建议头像尺寸200*200，格式支持Jpg，图片大小不得超过1M</span>
								<a href="javascript:;" class="avatar_upload">修改头像</a>
							</p>
						</div>
					</div>


					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 手机号</span>
						<input type="text" name="phone" disabled="disabled" class="ipt-text" placeholder="" value="{$userinfo.phone}">
					</div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 邮箱</span>
						<input type="text" name="email" disabled="disabled" class="ipt-text" placeholder="" value="{$userinfo.email}">
					</div>
					<div class="form-row clearfix">
						<span class="tt">所在地</span>
						<input type="text" name="address" disabled="disabled" class="ipt-text" placeholder="广东  广州" value="{$userinfo.address}">
					</div>
					
					

					<div class="form-row clearfix">
						<span class="tt"></span>
                        <input type="button" class="submit2" value="编辑">
						<input style="display:none" type="submit" class="submit" value="修改">
                        <input style="display:none" type="reset" class="reset" value="取消">
					</div>

				</form>
			    {elseif $p=='reset_psw'}
                    <form id="form3" method="post">
                   
                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 当前密码</span>
                        <input type="password" name="password" class="ipt-text" placeholder="请输入当前密码">
                    </div>
                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 新密码</span>
                        <input type="password" name="password1" disabled="disabled" class="ipt-text" placeholder="请输入新密码">
                    </div>
                    <div class="form-row clearfix">
                        <span class="tt"><em>*</em> 确认密码</span>
                        <input type="password" name="password2" disabled="disabled" class="ipt-text" placeholder="请再次输入新密码">
                    </div>
                    
                    <div class="form-row clearfix">
                        <span class="tt"></span>
                        <input type="submit" class="submit" value="修改">
                        <input type="reset" class="reset" value="取消">
                    </div>

                </form>
                {else}
                    <div class="news-list">
                        
                        {if !$page.list}暂无相关启事！{else}  
                        
                        <ul>
                            {section name=key loop=$page.list}
                             <li class="clearfix">
                                <a href="" target="_blank"><img src="{if $page.list[key].l_img}{$page.list[key].l_img}{else}../common/templates/images/wutu.jpg{/if}" alt=""></a>
                                <div class="news-info">
                                    <h1 style="margin-bottom:10px; font-size:20px; line-height:30px; letter-spacing:4px;">
									<span class="a-type1">{if $page.list[key].type==1||$page.list[key].l_type}[寻物]{else}[招领]{/if}</span>
									<a {if ($action=='pulling'||$action=='')&&$page.list[key].state==0} href="checkPull.php?pull_id={$page.list[key].pull_id}&type={if $page.list[key].type==1}lost{else}found{/if}&l_id={$page.list[key].l_id}" 
									{elseif $action=='records'} href='javascript:;' {else} href="detail.php?type={if $page.list[key].type==1}lost{else}found{/if}&l_id={$page.list[key].l_id}" {/if} target="_blank" class="a-type1"  >{$page.list[key].l_name}</a>{if ($action=='pulling'||$action=='')&&$page.list[key].state==0}<span class="a-type2 fr">(新)</span>
                                    {elseif ($action=='records')}
									<span class="fr" style="font-size:16px; font-weight:lighter;">({if $page.list[key].l_type==0}{if $page.list[key].rl_uid!=$uid}已归还{else}已领取<span class="thank thank-btn" data-rid="{$page.list[key].u_id}">写感谢信</span>{/if}{else}{if $page.list[key].rl_uid!=$uid}已领取<span class="thank thank-btn" style="padding:10px;" data-rid="{$page.list[key].u_id}">写感谢信</span>{else}已归还{/if}{/if})</span>
                                    {/if}</h1>
                                    <h2 style="margin-bottom:10px;"><span>特征 :</span><span>{$page.list[key].l_feature}</span></h2>
                                    {if $action=='records'}
                                    <p class="contact" style="font-size:15px;line-height:25px; color: #999999;">
									{if $page.list[key].l_type==0}{if $page.list[key].rl_uid==$uid}拾主{else}失主{/if}{/if}姓名 : {$page.list[key].name}<br>
									{if $page.list[key].l_type==0}{if $page.list[key].rl_uid==$uid}拾主{else}失主{/if}{/if}手机 : {$page.list[key].phone}<br>
									{if $page.list[key].l_type==0}{if $page.list[key].rl_uid==$uid}拾主{else}失主{/if}{/if}地址 : {$page.list[key].address}<br>
									{if $page.list[key].l_type==0}认领{else}归还{/if}日期 : {$page.list[key].rl_date}</p>
                                    {else}
                                    <p class="text a-type3" style="padding-top:0; font-size:12px; height:100px">
                                        {$page.list[key].l_desc}
                                    </p>
                                    
                                    <p class="author">
                                        <span class="time">{$page.list[key].p_date}</span>
                                        
                                    </p>
                                    {/if}
                                </div>
                                {if $action!='pulling'&&$action!=''&&$action!='records'}
                                <span class="shade" style="display:none; padding-top:8px;">
                                    {if $action=='waiting'&&$page.list[key].state==1}
                                    <p class="contact">联系人姓名：{$page.list[key].u_name}<br>联系人手机：{$page.list[key].u_phone}<br>联系人地址：{$page.list[key].u_address}</p>
                                    <div class="triangle"></div>
                                    {/if}
                                    {if $action=='working'}
                                    <div class="contact" style="width:430px; line-height:24px;">
                                    {if $page.list[key].xs}
                                        {section name=key2 loop=$page.list[key].xs}
                                            <p style="padding:10px 5px;"><span>{$page.list[key].xs[key2].xs_date}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>{$page.list[key].xs[key2].u_name}({$page.list[key].xs[key2].phone})</span><br><span>{$page.list[key].xs[key2].xs_context}</span></p>
                                        {/section}
                                    {else}
                                            <p style="padding:10px 5px;">暂无线索！</p>
                                    {/if}
                                    </div>
                                    <div class="triangle" style="margin-left:530px;"></div>
                                    {/if}
                                    <p class="clearfix" style="position:absolute;left:50%; top:74%; margin-left:-100px;">
                                       
                                        {if $action=='working'}
                                        <a class="thank" style="margin-left:120px;text-decoration:none; color:#fff;" href="edit_lost.php?type={$page.list[key].type}&l_id={$page.list[key].l_id}" target="_blank">编辑启事</a>
                                        <span class="thank showlm" style="cursor:pointer">查看线索</span>

                                        {elseif $action=='waiting'&&$page.list[key].state==1}
                                        <span class="thank" style="margin-left:120px;">联系人信息</span>
                                        {elseif $action=='waiting'&&$page.list[key].state==0}
                                        <span class="thank" style="margin-left:120px;">等待验证中……</span>
                                        {/if}
										 <a class="thank" href="detail.php?type={if $page.list[key].type==1}lost{else}found{/if}&l_id={$page.list[key].l_id}" target="_blank" style=" text-decoration:none; color:#fff;">启事详情</a>
                                    </p>
                                    {if $action=='working'}
                                    <span class="close" data-url="ajaxApi/delete_lost.php?type={$page.list[key].type}&l_id={$page.list[key].l_id}">
                                        <img src="../common/templates/images/close_btn.png" />
                                    </span>
                                    {/if}
                                </span>
                                {/if}
                            </li>
                            {/section}
                           
                        </ul>
                        {if $page.pageTotal>1}
                            <div class="pager">
                            {foreach from=$page.pageNav key=i item=value}
                                <a class="{$value.class}" href="?p=list&action={$action}&page={$value.pageIndex}">{$value.text}</a>
                            {/foreach}
                            </div>
                        {/if}
                    {/if}
                    </div>
                {/if}
			</div>
           
			
		</div>		
	</div>

    
</div>
<div class="mask" >
<div id="saying" style="padding: 10px 20px; position:fixed;">
    <input class="answer-input" name="title" style="height:30px;" placeholder="标题" />
    <textarea class="answer-input" name="content"  placeholder="内容"></textarea>
    <input class="leave-submit" style="margin-left:80px;" type="button" id="said" data-id="171" data-type="0" value="提交">
    <input class="leave-submit" type="button" value="取消" id="cancle-lv">
           
</div>
</div>     


<!-- 页面导航 -->
{include file="user/footBar.tpl"}
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/ucenter.js"></script>

</body>
</html>