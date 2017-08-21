<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>启事详情</title>
<link rel="stylesheet" href="../common/templates/user/css/style.css">


</head>

<body>

<!-- 页面导航 -->
{include file="user/topBar.tpl"}
<!-- /页面导航 -->

<div class="section notice">
	<div class="wrapper clearfix">
		<div class="mask"></div>
		<div class="detail">
			<div class="title-bar">
				<h1><a href="#" target="_blank">启事详情</a></h1>
			</div>
			<div class="detail-img">
				<img src="{if $list.l_img}../{$list.l_img|replace:'../':''|replace:'.':'big.'}{else}../common/templates/images/wutu.jpg{/if}" alt="">
				<div class="box">
					
				</div>	
			</div>
			
			<div class="words">
				<ul class="box fl">
					<li>
						<h2 class="a-type1" style="font-size:22px;"><span>{if $type=='lost'}[寻物] {else}[招领]{/if}</span> {$list.l_name}</h2>
						<h2>物品类别：{$list.name}</h2>
						<h2>物品特征：{$list.l_feature}</h2>
						<h2>{if $type=='lost'}丢物地点：{else}拾获地点：{/if}{$list.l_place}</h2>
						<h2>{if $type=='lost'}丢失时间：{else}拾获时间：{/if}{$list.l_date}</h2>
						{if $question}
						
							<ul id="question" class="contact_info" style="display:none; padding:20px 20px;">
							{if $uid}
								{section name=key loop=$question}
									<li><h3 class="q_id" data-id="{$question[key].q_id}">{$question[key].question}</h3> 
									<input class="answer-input" type="text" value="{$question[key].u_answer}" {if $question[key].u_answer} disabled="disabled" {/if}name="answer[]" style="margin-top:20px;" /></li>
								{/section}
								{if $question[0].u_answer}
									<li class="clearfix"  style="padding-top:10px;text-align: center"><span class="thank">答案验证中...</span><span class="thank" style="cursor:pointer" id="cancle" />返回</li>
								{else}
									<li style="padding-top:10px;text-align: center"><input class="answer-submit" type="button" value="提交" id="answered" /><input class="leave-submit" type="button" value="返回" id="cancle" /></li>
								{/if}
							{else}
								<h2>尊敬的用户，请先登陆！</h2>
								<a class="tologin" href="login.php">去登录</a>
                                <span class="canclelogin">取消</span>
							{/if}
							</ul>
							{if $uid}
							<div class="checked_box" style="padding:20px; display:none;" >
								<h2>{if $type=='lost'}您已通过验证，请尽快联系失主归还失物！{else}您已通过验证，请尽快联系拾主取回失物！{/if}</h2>
								<div style="text-align: center"><input class="leave-submit" type="button" value="好的" id="ok" data-id="{$list.l_id}" data-type="{$l_type}" /><input class="leave-submit" type="button" value="返回" id="cancle-rl" /></div>
							<div>
							{/if}		
						{else}
						<div class="contact_info" style="display:none; padding:20px 20px; padding-left:35px;">
							{if $uid}
							<h2> 联系姓名：{$list.u_name}</h2>
							<h2> 联系电话：{$list.u_phone}</h2>
							<h2> 联系地址：{$list.u_address}</h2>
							<h2>{if $type=='lost'} 请尽快联系失主归还失物！{else}请尽快联系拾主取回失物！{/if}</h2>
							<div><input class="leave-submit" style="margin-left:80px;" type="button" value="好的" id="ok" data-id="{$list.l_id}" data-type="{$l_type}" /><input class="leave-submit" type="button" value="取消" id="cancle" /></div>
							{else}
								<h2>尊敬的用户，请先登陆！</h2>
								<a class="tologin" href="login.php" style="text-decoration:none; color:#fff;">去登录</a>
                                <span class="canclelogin">取消</span>
							{/if}
						</div>
						{/if}
					</li>
					<li><h3>启事详情：</h3>
					<p class="text">{$list.l_desc}</p></li>
					<li><input class="getintouch" type="button" id="torl" value="{if $type=='lost'}联系归还{else}联系认领{/if}" /><input class="leave-submit" type="button" id="tosay" value="提供线索"/></li>
				</ul>
				<div id="saying" style="display:none;padding:20px 20px;">
                    {if $uid}
                        <textarea class="answer-input" name="xs_context"></textarea>
                        <input class="leave-submit" style="margin-left:80px;" type="button" id="said" data-id="{$list.l_id}" data-type="{$l_type}" value="提交"/>
                        <input class="leave-submit" type="button" value="取消" id="cancle-lv" />
                    {else}
                    <h2>尊敬的用户，请先登陆！</h2>
                    <a class="tologin" href="login.php" style="text-decoration:none; color:#fff;">去登录</a>
                    <span class="canclelogin">取消</span>
                    {/if}       
                </div>
			</div>
	
		</div>
	</div>
</div>

<!-- 页面导航 -->
{include file="user/footBar.tpl"}
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/detail.js"></script>
</body>
</html>
