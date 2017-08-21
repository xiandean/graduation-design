<?php /* Smarty version 2.6.29, created on 2016-03-16 15:05:42
         compiled from user/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'smartTruncate', 'user/search.tpl', 101, false),)), $this); ?>
<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>启事搜索</title>

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

<!--搜索区-->
<div class="section search">
    <div class="wrapper">
        <form action="search.php" method="get">
            <div class="search-box">
                
                <input class="search-input" type="text" id="search" name="keywords" value="<?php echo $this->_tpl_vars['keys']; ?>
" />

                <input class="search-submit" type="submit" value="搜索" />
                <input class="search-submit2 <?php if ($this->_tpl_vars['sub']): ?>active<?php endif; ?>" type="button" value="高级搜索" />
                <div class="usually">
                    <span class="tt a-type1">常用关键字 : </span>
                    <span class="select">
                        <a href="">手机</a>
                        <a href="">钱包</a>
                        <a href="">校园卡</a>
                        <a href="">银行卡</a>
                        <a href="">学生证</a>
                        <a href="">雨伞</a>
                        <a href="">教材</a>
                        <a href="">水壶</a>
                        <a href="">钥匙</a>
                        <a href="">电脑</a>
                        <a href="">耳机</a>
                        <a href="">U盘</a>
                        <a href="">身份证</a>
                        <a href="">背包</a>
                    </span>
                </div>
            </div>
        </form>
        <form action="search.php" method="get">
            <ul class="sub-search clearfix" <?php if (! $this->_tpl_vars['sub']): ?>style="display:none;"<?php endif; ?>>
            <span>启事类型：</span>
            <select id="select1">
                <option value="1"  <?php if ($this->_tpl_vars['type'] == 1): ?>selected="selected"<?php endif; ?>>所有启事</option>
                <option value="2"  <?php if ($this->_tpl_vars['type'] == 2): ?>selected="selected"<?php endif; ?>>寻物启事</option>
                <option value="3"  <?php if ($this->_tpl_vars['type'] == 3): ?>selected="selected"<?php endif; ?>>招领启事</option>
            </select> 
            <input type="hidden" id="type" name="type" value="" />
            <span>失物类别：</span>
            <select id="select2">
                <option value="0" <?php if ($this->_tpl_vars['class'] == 0): ?>selected="selected"<?php endif; ?>>不限</option>
                <option value="1" <?php if ($this->_tpl_vars['class'] == 1): ?>selected="selected"<?php endif; ?>>证件</option>
                <option value="2" <?php if ($this->_tpl_vars['class'] == 2): ?>selected="selected"<?php endif; ?>>电子产品</option>
                <option value="3" <?php if ($this->_tpl_vars['class'] == 3): ?>selected="selected"<?php endif; ?>>学习用品</option>
                <option value="4" <?php if ($this->_tpl_vars['class'] == 4): ?>selected="selected"<?php endif; ?>>衣物</option>
                <option value="5" <?php if ($this->_tpl_vars['class'] == 5): ?>selected="selected"<?php endif; ?>>箱包</option>
                <option value="6" <?php if ($this->_tpl_vars['class'] == 6): ?>selected="selected"<?php endif; ?>>宠物</option>
                <option value="7" <?php if ($this->_tpl_vars['class'] == 7): ?>selected="selected"<?php endif; ?>>其他</option>
            </select>
             <input type="hidden" id="class" name="class" value="" />
            <span>丢失日期：</span>
            <input name="date1" value="<?php echo $this->_tpl_vars['date1']; ?>
" type="text" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5><span style="padding:0 5px;">至</span><input name="date2" type="text" value="<?php echo $this->_tpl_vars['date2']; ?>
" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5>
            <span>关键字：</span>
            <input type="text" class="sub-keywords" value="<?php echo $this->_tpl_vars['keys']; ?>
" name="sub-keywords"/>
            <input type="submit" class="select-btn thank" value=" 筛 选 "/>
            </ul>
        </form> 
    </div>
</div>


<!-- 启事记录 -->
<div class="section programs" style="height:auto;">
	<div class="wrapper">
        <h1 class="title-bar">搜索结果</h1>   
        <div class="section-programs wrapper">
        <?php if (! $this->_tpl_vars['page']['list']): ?><p style="padding-left:20px;line-height:30px;">暂无相关启事！</p><?php else: ?>  
                
                
            <p style="padding-left:20px;line-height:30px;">共有<?php echo $this->_tpl_vars['page']['count']; ?>
条记录，分<?php echo $this->_tpl_vars['page']['pageTotal']; ?>
页，每页<?php echo $this->_tpl_vars['page']['pageRows']; ?>
条，当前页为<?php echo $this->_tpl_vars['page']['pageNow']; ?>
。</p>
                <ul class="clearfix">
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
                <li>
                    <a href="detail.php?type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 0): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
" target="_blank"><img src="<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_img']): ?><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_img']; ?>
<?php else: ?>../common/templates/images/wutu.jpg<?php endif; ?>" alt=""></a>
                    <div class="programs-info">
                        <h2><span class="a-type1"><?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 0): ?>[寻物] <?php else: ?>[招领] <?php endif; ?></span><a href="detail.php?type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 0): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
"  class="a-type1" target="_blank"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_name']; ?>
</a></h2>
                        <div class="author">
                            <p class="com" style="height:20px; overflow:hidden;">特征 : <?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_feature']; ?>
</p>
                            <p style="height:54px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_desc'])) ? $this->_run_mod_handler('smartTruncate', true, $_tmp, 50, "...") : smarty_modifier_smartTruncate($_tmp, 50, "...")); ?>
</p>
                            <p>
                                <span class="time"><?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['p_date']; ?>
</span>
                            </p>
                        </div>
                        <div class="vote"><a target="_blank" href="detail.php?type=<?php if ($this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['type'] == 0): ?>lost<?php else: ?>found<?php endif; ?>&l_id=<?php echo $this->_tpl_vars['page']['list'][$this->_sections['key']['index']]['l_id']; ?>
">查看详情</a></div>
                    </div>
                </li>
                <?php endfor; endif; ?>
                
                    
                </ul>
                <?php if ($this->_tpl_vars['page']['pageTotal'] > 1): ?>
                    <div class="pager">
                    <?php $_from = $this->_tpl_vars['page']['pageNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['value']):
?>
                        <a class="<?php echo $this->_tpl_vars['value']['class']; ?>
" href="?type=<?php echo $this->_tpl_vars['type']; ?>
<?php echo $this->_tpl_vars['keywords']; ?>
&page=<?php echo $this->_tpl_vars['value']['pageIndex']; ?>
"><?php echo $this->_tpl_vars['value']['text']; ?>
</a>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>

        <?php endif; ?>
        </div>  
    </div>
</div>
<!-- /创业项目 -->

<!-- 页面导航 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user/footBar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/Date/WdatePicker.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/search.js"></script>
</body>
</html>