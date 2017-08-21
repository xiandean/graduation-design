<div class="section header">
	<div class="wrapper clearfix">
        <div class="logo fl"><img src="../common/templates/images/logo.png"></div>   
        <div class="main-nav fl">
            <ul>
                <li><a href="index.php" {if $title=='index'}class="on"{/if}>首页</a><span>|</span></li>
                <li><a href="list_lost.php" {if $title=='list_lost'}class="on"{/if}>寻物大厅</a><span>|</span></li>
                <li><a href="list_found.php" {if $title=='list_found'}class="on"{/if}>招领大厅</a><span>|</span></li>
                <li><a href="p_lost.php" {if $title=='p_lost'}class="on"{/if}>发布启事</a><span>|</span></li>
                <li class="last"><a href="about.php" target="_blank" {if $title=='about'}class="on"{/if}>关于我们</a></li>
            </ul>
        </div>   

        <div class="ucenter fr">
        
        {if (!$uid)}
       
            <ul class="unlogin">
                <li><a href="login.php">登录</a><span>|</span></li>
                <li><a href="regist.php" target="_blank">注册</a></li>
            </ul>
        {else}
            <div class="logined" style=" width:auto;">
                <div href="#" id="uc-menu" target="_blank">
                    <span class="avatar"><img src="{$headImg}" alt=""></span>
					<span class="mutip" id="mutip" style="display:none;"><img src="../common/templates/images/bubble.png" ></span>
					<span class="nickname">{$username}</span>
                    <div class="uc-menu">
                        <span class="a"></span>
                        <ul>
                            <!--判断新消息来源-->
                            <li style="display:none;" id="pull_wrap"><a href="ucenter.php?p=list&action=pulling">最新推送<span class="mnumber"><h3 id="pullnum">0</h3></span></a></li>
                            <li style="display:none;" id="xs_wrap"><a href="javascript:;" id="getxs">收到线索<span class="mnumber"><h3 id="xsnum">0</h3></span></a></li>
                            <li style="display:none;" id="vd_wrap"><a href="javascript:;" id="getvalidation">验证处理<span class="mnumber"><h3 id="vdnum">0</h3></span></a></li>
                            <!--无新消息时-->		
                            <li><a href="ucenter.php?p=list&action=working">正在发布</a></li>
							<li><a href="ucenter.php?p=list">匹配推送</a></li>
                            <li><a href="check_rl.php" id="getrl">历史记录<span class="mnumber" style="display:none;" id="rl_wrap"><h3 id="rlnum">0</h3></span></a></li>
                            <li><a href="ucenter.php">个人资料</a></li>
							<li><a href="ucenter.php?p=reset_psw">修改密码</a></li>
                            <li><a href="exit.php">退出</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
        {/if}
        </div>
        <span class="fr a-type2" style="height:60px; line-height:80px; padding-right:10px; display:none;" id="msg-tip">您有0条未处理消息</span>
    </div>
</div>
<div class="vd-mask" style="display:none;">
    <ul class="pop_box" style=" padding:20px 20px;">
		<li class="vd-title" style="padding-bottom:0; font-size:14px">
			<h3>
				<span>[招领]</span>
				<a href="detail.php?type=found&amp;l_id=60" target="_blank">电脑</a>
			</h3>
		</li>
		<li class="vd-title2" style="padding-bottom:0; font-size:14px">
			<span>留言用户：</span>
			<span>xiandean</span>
		</li>
		
		<li>
			<textarea class="answer-input" disabled="disabled" style="margin-top:10px; height:auto; border-color:#f5f5f5;">您没设置验证问题</textarea>
		</li>
		<li class="clearfix" style="padding-top:0;padding-bottom:20px;border-bottom: solid 1px #dddddd;">
			<span class="thank vd-confirm" data-rid="54" data-confirm="yes" style="cursor:pointer">保存</span>
			<span class="thank vd-confirm" data-rid="54" data-confirm="no" style="cursor:pointer">忽略</span>
			<span class="thank vd-cancle" style="cursor:pointer">回复</span>
		</li>
		<span class="pop_close"><img src="../common/templates/images/close_btn.png"></span>
	</ul>
</div> 

