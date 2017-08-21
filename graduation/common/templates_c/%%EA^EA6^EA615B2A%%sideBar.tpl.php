<?php /* Smarty version 2.6.29, created on 2016-03-14 22:25:39
         compiled from admin/sideBar.tpl */ ?>
<div class="aside">
    <div class="managerinfo clearfix">
        <a href="m_edit.php" target="_blank"><img src="<?php if ($this->_tpl_vars['mheadImg']): ?> <?php echo $this->_tpl_vars['mheadImg']; ?>
 <?php else: ?> images/detail_avatar.jpg <?php endif; ?>" alt=""></a>
        <div class="follow-info">
            <h4><a href="m_edit.php" target="_blank"><?php echo $this->_tpl_vars['mname']; ?>
</a></h4>
            <h5><a href="exit.php">退出</a></h5>
        </div>  
    </div>
    <div class="manager-nav">
        <ul>
            <?php if ($this->_tpl_vars['mid'] == 1): ?>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'm_list'): ?>on<?php endif; ?>"><a href="m_list.php">管理员管理</a></li>
            <?php endif; ?>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'u_list'): ?>on<?php endif; ?>"><a href="u_list.php">用户管理</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'list'): ?>on<?php endif; ?>"><a href="list.php">启事管理</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'pull'): ?>on<?php endif; ?>"><a href="pull_list.php">匹配推送</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'answer'): ?>on<?php endif; ?>"><a href="a_list.php">回答验证</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'thank'): ?>on<?php endif; ?>"><a href="t_list.php">感谢信管理</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'note'): ?>on<?php endif; ?>"><a href="n_list.php">公告管理</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'leave'): ?>on<?php endif; ?>"><a href="leave_list.php">留言管理</a></li>
            <li class="nav1 <?php if ($this->_tpl_vars['title'] == 'renling'): ?>on<?php endif; ?>"><a href="rl_list.php">认领管理</a></li>
        </ul>
        
    </div>
</div>