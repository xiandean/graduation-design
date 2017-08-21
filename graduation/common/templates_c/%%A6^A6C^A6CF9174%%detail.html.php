<?php /* Smarty version 2.6.29, created on 2016-03-14 22:29:13
         compiled from user/detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'user/detail.html', 29, false),)), $this); ?>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/topBar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- /页面导航 -->

<div class="section notice">
	<div class="wrapper clearfix">
		<div class="mask"></div>
		<div class="detail">
			<div class="title-bar">
				<h1><a href="#" target="_blank">启事详情</a></h1>
			</div>
			<div class="detail-img">
				<img src="<?php if ($this->_tpl_vars['list']['l_img']): ?>../<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['l_img'])) ? $this->_run_mod_handler('replace', true, $_tmp, '../', '') : smarty_modifier_replace($_tmp, '../', '')))) ? $this->_run_mod_handler('replace', true, $_tmp, '.', 'big.') : smarty_modifier_replace($_tmp, '.', 'big.')); ?>
<?php else: ?>../common/templates/images/wutu.jpg<?php endif; ?>" alt="">
				<div class="box">
					
				</div>	
			</div>
			
			<div class="words">
				<ul class="box fl">
					<li>
						<h2 class="a-type1" style="font-size:22px;"><span><?php if ($this->_tpl_vars['type'] == 'lost'): ?>[寻物] <?php else: ?>[招领]<?php endif; ?></span> <?php echo $this->_tpl_vars['list']['l_name']; ?>
</h2>
						<h2>物品类别：<?php echo $this->_tpl_vars['list']['name']; ?>
</h2>
						<h2>物品特征：<?php echo $this->_tpl_vars['list']['l_feature']; ?>
</h2>
						<h2><?php if ($this->_tpl_vars['type'] == 'lost'): ?>丢物地点：<?php else: ?>拾获地点：<?php endif; ?><?php echo $this->_tpl_vars['list']['l_place']; ?>
</h2>
						<h2><?php if ($this->_tpl_vars['type'] == 'lost'): ?>丢失时间：<?php else: ?>拾获时间：<?php endif; ?><?php echo $this->_tpl_vars['list']['l_date']; ?>
</h2>
						<?php if ($this->_tpl_vars['question']): ?>
						<!-- <h2>联系方式：<input class="leave-submit" type="button" id="toanswer" value="回答验证问题" style="margin-left:5px;"/></h2> -->
							<ul id="question" class="contact_info" style="display:none; padding:20px 20px;">
							<?php if ($this->_tpl_vars['uid']): ?>
								<?php unset($this->_sections['key']);
$this->_sections['key']['name'] = 'key';
$this->_sections['key']['loop'] = is_array($_loop=$this->_tpl_vars['question']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<li><h3 class="q_id" data-id="<?php echo $this->_tpl_vars['question'][$this->_sections['key']['index']]['q_id']; ?>
"><?php echo $this->_tpl_vars['question'][$this->_sections['key']['index']]['question']; ?>
</h3> 
									<input class="answer-input" type="text" value="<?php echo $this->_tpl_vars['question'][$this->_sections['key']['index']]['u_answer']; ?>
" <?php if ($this->_tpl_vars['question'][$this->_sections['key']['index']]['u_answer']): ?> disabled="disabled" <?php endif; ?>name="answer[]" style="margin-top:20px;" /></li>
								<?php endfor; endif; ?>
								<?php if ($this->_tpl_vars['question'][0]['u_answer']): ?>
									<li class="clearfix"  style="padding-top:10px;text-align: center"><span class="thank">答案验证中...</span><span class="thank" style="cursor:pointer" id="cancle" />返回</li>
								<?php else: ?>
									<li style="padding-top:10px;text-align: center"><input class="answer-submit" type="button" value="提交" id="answered" /><input class="leave-submit" type="button" value="返回" id="cancle" /></li>
								<?php endif; ?>
							<?php else: ?>
								<h2>尊敬的用户，请先登陆！</h2>
								<a class="tologin" href="login.php">去登录</a>
                                <span class="canclelogin">取消</span>
							<?php endif; ?>
							</ul>
							<?php if ($this->_tpl_vars['uid']): ?>
							<div class="checked_box" style="padding:10px;display:none;" >
								<h2><?php if ($this->_tpl_vars['type'] == 'lost'): ?>您已通过验证，请尽快联系失主归还失物！<?php else: ?>您已通过验证，请尽快联系拾主取回失物！<?php endif; ?></h2>
								<div style="text-align: center"><input class="leave-submit" type="button" value="好的" id="ok" data-id="<?php echo $this->_tpl_vars['list']['l_id']; ?>
" data-type="<?php echo $this->_tpl_vars['l_type']; ?>
" /><input class="leave-submit" type="button" value="返回" id="cancle-rl" /></div>
							<div>
							<?php endif; ?>		
						<?php else: ?>
						<div class="contact_info" style="display:none; padding:20px 20px; padding-left:35px;">
							<?php if ($this->_tpl_vars['uid']): ?>
							<h2> 联系姓名：<?php echo $this->_tpl_vars['list']['u_name']; ?>
</h2>
							<h2> 联系电话：<?php echo $this->_tpl_vars['list']['u_phone']; ?>
</h2>
							<h2> 联系地址：<?php echo $this->_tpl_vars['list']['u_address']; ?>
</h2>
							<h2><?php if ($this->_tpl_vars['type'] == 'lost'): ?> 请尽快联系失主归还失物！<?php else: ?>请尽快联系拾主取回失物！<?php endif; ?></h2>
							<div><input class="leave-submit" style="margin-left:80px;" type="button" value="好的" id="ok" data-id="<?php echo $this->_tpl_vars['list']['l_id']; ?>
" data-type="<?php echo $this->_tpl_vars['l_type']; ?>
" /><input class="leave-submit" type="button" value="取消" id="cancle" /></div>
							<?php else: ?>
								<h2>尊敬的用户，请先登陆！</h2>
								<a class="tologin" href="login.php" style="text-decoration:none; color:#fff;">去登录</a>
                                <span class="canclelogin">取消</span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</li>
					<li><h3>启事详情：</h3>
					<p class="text"><?php echo $this->_tpl_vars['list']['l_desc']; ?>
</p></li>
					<li><input class="leave-submit" type="button" id="torl" value="<?php if ($this->_tpl_vars['type'] == 'lost'): ?>我要归还<?php else: ?>我要认领<?php endif; ?>" /><input class="leave-submit" type="button" id="tosay" value="我要提供线索"/></li>
				</ul>
				<div id="saying" style="display:none;padding:20px 20px;">
                    <?php if ($this->_tpl_vars['uid']): ?>
                        <textarea class="answer-input" name="xs_context"></textarea>
                        <input class="leave-submit" style="margin-left:80px;" type="button" id="said" data-id="<?php echo $this->_tpl_vars['list']['l_id']; ?>
" data-type="<?php echo $this->_tpl_vars['l_type']; ?>
" value="提交"/>
                        <input class="leave-submit" type="button" value="取消" id="cancle-lv" />
                    <?php else: ?>
                    <h2>尊敬的用户，请先登陆！</h2>
                    <a class="tologin" href="login.php" style="text-decoration:none; color:#fff;">去登录</a>
                    <span class="canclelogin">取消</span>
                    <?php endif; ?>       
                </div>
			</div>
	
		</div>
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
<script type="text/javascript" src="../common/templates/user/js/detail.js"></script>
</body>
</html>