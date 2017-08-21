<?php /* Smarty version 2.6.29, created on 2016-03-16 20:55:19
         compiled from user/list_announce.tpl */ ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>公告大厅</title>
<link rel="stylesheet" href="../common/templates/user/css/style.css">

</head>

<body>

<!-- 页面导航 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/topBar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- /页面导航 -->


<!--公告列表 -->
<div class="section notes">
	<div class="wrapper clearfix">
		<div class="section-notes">
			<div class="title-bar"><h1>公告大厅</h1></div>
            <form action="" class="search-box" style="margin-top:20px;">
                <div class="search-box">
                    <input class="search-input" type="text"  name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
" />
                    <input class="search-submit" type="submit" value="搜索" />
                </div>
            </form> 
        	<div class="notes-list"> 
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
                        <div class="notes-info">
                            <h2 style="color:#16ce8b;"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['title']; ?>
</h2>
                            <p class="author">
                                <span class="time"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['p_date']; ?>
</span>
                            </p>
                            <p class="text"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['context']; ?>

                            </p>
                        </div>
                  </li>
                  <?php endfor; endif; ?>
                     
                </ul>
			     <?php if ($this->_tpl_vars['page']['pageTotal'] > 1): ?>
                    <div class="pager" style="margin:30px 0;">
                    <?php $_from = $this->_tpl_vars['page']['pageNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['value']):
?>
                        <a class="<?php echo $this->_tpl_vars['value']['class']; ?>
" href="?<?php if ($this->_tpl_vars['keyword']): ?>keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&<?php endif; ?>page=<?php echo $this->_tpl_vars['value']['pageIndex']; ?>
"><?php echo $this->_tpl_vars['value']['text']; ?>
</a>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
            </div>
			
		
		</div>  
	</div>
</div>
<!-- 公告列表 -->

<!-- 页面导航 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/footBar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>

</body>
</html>