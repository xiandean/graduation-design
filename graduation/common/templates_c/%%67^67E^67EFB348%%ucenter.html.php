<?php /* Smarty version 2.6.29, created on 2016-03-14 22:29:06
         compiled from user/ucenter.html */ ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/topBar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
                <img src="<?php if ($this->_tpl_vars['headImg']): ?> <?php echo $this->_tpl_vars['headImg']; ?>
 <?php else: ?> ../common/templates/images/detail_avatar.jpg <?php endif; ?>" alt=""></a>
                <div class="follow-info">
                    <h4><?php echo $this->_tpl_vars['username']; ?>
</h4>
                    <a href="exit.php"><p class="uCenter-type0">退出</p></a>
                </div>  
            </div>
            <div class="uCenter-nav">
                <ul>
                    <li class="nav3 <?php if ($this->_tpl_vars['p'] == 'user_info' || $this->_tpl_vars['p'] == ''): ?>on<?php endif; ?>"><a href="ucenter.php?p=user_info">资料设置</a></li>
                    <li class="nav2 <?php if ($this->_tpl_vars['p'] == 'reset_psw'): ?>on<?php endif; ?>"><a href="ucenter.php?p=reset_psw">修改密码</a></li>
                    <li class="nav1"><a href="ucenter.php?p=list">启事管理</a></li>
                </ul>
                <?php if ($this->_tpl_vars['p'] == 'list'): ?>
                <ul class="sub-menu">
                    <li <?php if ($this->_tpl_vars['action'] == 'pulling' || $this->_tpl_vars['action'] == ''): ?>class="on" <?php endif; ?>><a href="ucenter.php?p=list&action=pulling">匹配推送</a></li>
                    <li <?php if ($this->_tpl_vars['action'] == 'working'): ?>class="on" <?php endif; ?>><a href="ucenter.php?p=list&action=working">正在发布</a></li>
                    <li <?php if ($this->_tpl_vars['action'] == 'waiting'): ?>class="on" <?php endif; ?>><a href="ucenter.php?p=list&action=waiting">等待验证</a></li>
                    <li <?php if ($this->_tpl_vars['action'] == 'records'): ?>class="on" <?php endif; ?>><a href="ucenter.php?p=list&action=records">历史记录</a></li>
                </ul>
                <?php endif; ?>
            </div>

        </div>
		<div class="uCenter-content fr">
            
			<div class="uCenter-follow ucenter-set">
            <?php if ($this->_tpl_vars['p'] == 'user_info'): ?>
                <form id="form" action="../common/uploadImg.php?type=headIcon" method="post"  enctype="multipart/form-data" target="frame">
                    <p style="display:none;"><input type="file" name="file"  id="upload_file"></p>
                </form>
				<form id="form2" method="post" action='reset_user.php'>
					<div class="form-row clearfix">
                        <span class="tt"><em>*</em> 用户名</span>
                        <input type="text" name="name" disabled="false" class="ipt-text" placeholder="请输入用户名" value="<?php echo $this->_tpl_vars['userinfo']['name']; ?>
">
                    </div>

					<div class="form-row clearfix">
						<span class="tt">我的头像</span>
						<div class="avatar">
                            <input type="hidden" name="imgpath" value="<?php echo $this->_tpl_vars['userinfo']['img']; ?>
">
							<img class="fl" id="msg" src="<?php if ($this->_tpl_vars['userinfo']['img']): ?> <?php echo $this->_tpl_vars['userinfo']['img']; ?>
 <?php else: ?> ../common/templates/images/detail_avatar.jpg <?php endif; ?>" alt="">
							<p style="display:none">
								<span>建议头像尺寸200*200，格式支持Jpg，图片大小不得超过1M</span>
								<a href="javascript:;" class="avatar_upload">修改头像</a>
							</p>
						</div>
					</div>


					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 手机号</span>
						<input type="text" name="phone" disabled="disabled" class="ipt-text" placeholder="" value="<?php echo $this->_tpl_vars['userinfo']['phone']; ?>
">
					</div>
					<div class="form-row clearfix">
						<span class="tt"><em>*</em> 邮箱</span>
						<input type="text" name="email" disabled="disabled" class="ipt-text" placeholder="" value="<?php echo $this->_tpl_vars['userinfo']['email']; ?>
">
					</div>
					<div class="form-row clearfix">
						<span class="tt">所在地</span>
						<input type="text" name="address" disabled="disabled" class="ipt-text" placeholder="广东  广州" value="<?php echo $this->_tpl_vars['userinfo']['address']; ?>
">
					</div>
					
					

					<div class="form-row clearfix">
						<span class="tt"></span>
                        <input type="button" class="submit2" value="编辑">
						<input style="display:none" type="submit" class="submit" value="修改">
                        <input style="display:none" type="reset" class="reset" value="取消">
					</div>

				</form>
			    <?php elseif ($this->_tpl_vars['p'] == 'reset_psw'): ?>
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
                <?php else: ?>
                    <div class="news-list">
                        
                        <?php if (! $this->_tpl_vars['page']['list']): ?>暂无相关启事！<?php else: ?>  
                        
                        <ul>
                            <?php unset($this->_sections['key']);
$this->_sections['key']['name'] = 'key';
$this->_sections['key']['loop'] = is_array($_loop=$this->_tpl_vars['page']['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['key']['show'] = true;
$this->_sections['key']['max'] = $this->_sections['key']['loop'];
$this->_sections['key']['step'] = 1;
$this->_sections['key']['start'] = $this->_sections['key']['step'] > 0 ? 0 : $this->_sections['key']['loop']-1;
if ($this->_sections['key']['show']) {
    $this->_sections['key']['total'] = $this->_sections['key']['loop'];
    if ($this->_sections['key']['total'] == 0)
        $this->_sections['key']['show'] = false;
} else
    $this->_sections['key']['total'] = 0;
if ($this->_sections['key']['show']):

            for ($this->_sections['key']['index'] = $this->_sections['key']['start'], $this->_sections['key']['iteration'] = 1;
                 $this->_sections['key']['iteration'] <= $this->_sections['key']['total'];
                 $this->_sections['key']['index'] += $this->_sections['key']['step'], $this->_sections['key']['iteration']++):
$this->_sections['key']['rownum'] = $this->_sections['key']['iteration'];
$this->_sections['key']['index_prev'] = $this->_sections['key']['index'] - $this->_sections['key']['step'];
$this->_sections['key']['index_next'] = $this->_sections['key']['index'] + $this->_sections['key']['step'];
$this->_sections['key']['first']      = ($this->_sections['key']['iteration'] == 1);
$this->_sections['key']['last']       = ($this->_sections['key']['iteration'] == $this->_sections['key']['total']);
?>
                             <li class="clearfix">
                                <a href="" target="_blank"><img src="<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_img']): ?><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_img']; ?>
<?php else: ?>../common/templates/images/wutu.jpg<?php endif; ?>" alt=""></a>
                                <div class="news-info">
                                    <h1 style="margin-bottom:10px; font-size:20px; line-height:30px; letter-spacing:4px;">
									<span class="a-type1"><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 1 || $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type']): ?>[寻物]<?php else: ?>[招领]<?php endif; ?></span>
									<a <?php if (( $this->_tpl_vars['action'] == 'pulling' || $this->_tpl_vars['action'] == '' ) && $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['state'] == 0): ?> href="checkPull.php?pull_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['pull_id']; ?>
&type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 1): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
" 
									<?php elseif ($this->_tpl_vars['action'] == 'records'): ?> href='javascript:;' <?php else: ?> href="detail.php?type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 1): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
" <?php endif; ?> target="_blank" class="a-type1"  ><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_name']; ?>
</a><?php if (( $this->_tpl_vars['action'] == 'pulling' || $this->_tpl_vars['action'] == '' ) && $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['state'] == 0): ?><span class="a-type2 fr">(新)</span>
                                    <?php elseif (( $this->_tpl_vars['action'] == 'records' )): ?>
									<span class="fr" style="font-size:16px; font-weight:lighter;">(<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type'] == 0): ?><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_uid'] != $this->_tpl_vars['uid']): ?>已归还<?php else: ?>已领取<span class="thank thank-btn" data-rid="<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['u_id']; ?>
">写感谢信</span><?php endif; ?><?php else: ?><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_uid'] != $this->_tpl_vars['uid']): ?>已领取<span class="thank thank-btn" style="padding:10px;" data-rid="<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['u_id']; ?>
">写感谢信</span><?php else: ?>已归还<?php endif; ?><?php endif; ?>)</span>
                                    <?php endif; ?></h1>
                                    <h2 style="margin-bottom:10px;"><span>特征 :</span><span><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_feature']; ?>
</span></h2>
                                    <?php if ($this->_tpl_vars['action'] == 'records'): ?>
                                    <p class="contact" style="font-size:15px;line-height:25px; color: #999999;">
									<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type'] == 0): ?><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_uid'] == $this->_tpl_vars['uid']): ?>拾主<?php else: ?>失主<?php endif; ?><?php endif; ?>姓名 : <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['name']; ?>
<br>
									<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type'] == 0): ?><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_uid'] == $this->_tpl_vars['uid']): ?>拾主<?php else: ?>失主<?php endif; ?><?php endif; ?>手机 : <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['phone']; ?>
<br>
									<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type'] == 0): ?><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_uid'] == $this->_tpl_vars['uid']): ?>拾主<?php else: ?>失主<?php endif; ?><?php endif; ?>地址 : <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['address']; ?>
<br>
									<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_type'] == 0): ?>认领<?php else: ?>归还<?php endif; ?>日期 : <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['rl_date']; ?>
</p>
                                    <?php else: ?>
                                    <p class="text a-type3" style="padding-top:0; font-size:12px; height:100px">
                                        <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_desc']; ?>

                                    </p>
                                    
                                    <p class="author">
                                        <span class="time"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['p_date']; ?>
</span>
                                        
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <?php if ($this->_tpl_vars['action'] != 'pulling' && $this->_tpl_vars['action'] != '' && $this->_tpl_vars['action'] != 'records'): ?>
                                <span class="shade" style="display:none; padding-top:8px;">
                                    <?php if ($this->_tpl_vars['action'] == 'waiting' && $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['state'] == 1): ?>
                                    <p class="contact">联系人姓名：<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['u_name']; ?>
<br>联系人手机：<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['u_phone']; ?>
<br>联系人地址：<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['u_address']; ?>
</p>
                                    <div class="triangle"></div>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['action'] == 'working'): ?>
                                    <div class="contact" style="width:430px; line-height:24px;">
                                    <?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs']): ?>
                                        <?php unset($this->_sections['key2']);
$this->_sections['key2']['name'] = 'key2';
$this->_sections['key2']['loop'] = is_array($_loop=$this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['key2']['show'] = true;
$this->_sections['key2']['max'] = $this->_sections['key2']['loop'];
$this->_sections['key2']['step'] = 1;
$this->_sections['key2']['start'] = $this->_sections['key2']['step'] > 0 ? 0 : $this->_sections['key2']['loop']-1;
if ($this->_sections['key2']['show']) {
    $this->_sections['key2']['total'] = $this->_sections['key2']['loop'];
    if ($this->_sections['key2']['total'] == 0)
        $this->_sections['key2']['show'] = false;
} else
    $this->_sections['key2']['total'] = 0;
if ($this->_sections['key2']['show']):

            for ($this->_sections['key2']['index'] = $this->_sections['key2']['start'], $this->_sections['key2']['iteration'] = 1;
                 $this->_sections['key2']['iteration'] <= $this->_sections['key2']['total'];
                 $this->_sections['key2']['index'] += $this->_sections['key2']['step'], $this->_sections['key2']['iteration']++):
$this->_sections['key2']['rownum'] = $this->_sections['key2']['iteration'];
$this->_sections['key2']['index_prev'] = $this->_sections['key2']['index'] - $this->_sections['key2']['step'];
$this->_sections['key2']['index_next'] = $this->_sections['key2']['index'] + $this->_sections['key2']['step'];
$this->_sections['key2']['first']      = ($this->_sections['key2']['iteration'] == 1);
$this->_sections['key2']['last']       = ($this->_sections['key2']['iteration'] == $this->_sections['key2']['total']);
?>
                                            <p style="padding:10px 5px;"><span><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs'][$this->_sections['key2']['index']]['xs_date']; ?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs'][$this->_sections['key2']['index']]['u_name']; ?>
(<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs'][$this->_sections['key2']['index']]['phone']; ?>
)</span><br><span><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['xs'][$this->_sections['key2']['index']]['xs_context']; ?>
</span></p>
                                        <?php endfor; endif; ?>
                                    <?php else: ?>
                                            <p style="padding:10px 5px;">暂无线索！</p>
                                    <?php endif; ?>
                                    </div>
                                    <div class="triangle" style="margin-left:530px;"></div>
                                    <?php endif; ?>
                                    <p class="clearfix" style="position:absolute;left:50%; top:74%; margin-left:-100px;">
                                       
                                        <?php if ($this->_tpl_vars['action'] == 'working'): ?>
                                        <a class="thank" style="margin-left:120px;text-decoration:none; color:#fff;" href="edit_lost.php?type=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type']; ?>
&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
" target="_blank">编辑启事</a>
                                        <span class="thank showlm" style="cursor:pointer">查看线索</span>

                                        <?php elseif ($this->_tpl_vars['action'] == 'waiting' && $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['state'] == 1): ?>
                                        <span class="thank" style="margin-left:120px;">联系人信息</span>
                                        <?php elseif ($this->_tpl_vars['action'] == 'waiting' && $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['state'] == 0): ?>
                                        <span class="thank" style="margin-left:120px;">等待验证中……</span>
                                        <?php endif; ?>
										 <a class="thank" href="detail.php?type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 1): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
" target="_blank" style=" text-decoration:none; color:#fff;">启事详情</a>
                                    </p>
                                    <?php if ($this->_tpl_vars['action'] == 'working'): ?>
                                    <span class="close" data-url="ajaxApi/delete_lost.php?type=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type']; ?>
&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
">
                                        <img src="../common/templates/images/close_btn.png" />
                                    </span>
                                    <?php endif; ?>
                                </span>
                                <?php endif; ?>
                            </li>
                            <?php endfor; endif; ?>
                           
                        </ul>
                        <?php if ($this->_tpl_vars['page']['pageTotal'] > 1): ?>
                            <div class="pager">
                            <?php $_from = $this->_tpl_vars['page']['pageNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['value']):
?>
                                <a class="<?php echo $this->_tpl_vars['value']['class']; ?>
" href="?p=list&action=<?php echo $this->_tpl_vars['action']; ?>
&page=<?php echo $this->_tpl_vars['value']['pageIndex']; ?>
"><?php echo $this->_tpl_vars['value']['text']; ?>
</a>
                            <?php endforeach; endif; unset($_from); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
			</div>
           
			
		</div>		
	</div>

    
</div>
<div class="mask" >
<div id="saying" style="padding: 10px 20px; position:fixed;">
    <input class="answer-input" name="title" style="height:30px;" placeholder="标题" />
    <textarea class="answer-input" name="content"  placeholder="内容"></textarea>
    <input class="leave-submit" type="button" id="said" data-id="171" data-type="0" value="提交">
    <input class="leave-submit" type="button" value="取消" id="cancle-lv">
           
</div>
</div>     


<!-- 页面导航 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/footBar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/ucenter.js"></script>

</body>
</html>