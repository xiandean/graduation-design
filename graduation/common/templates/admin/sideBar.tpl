<div class="aside">
    <div class="managerinfo clearfix">
        <a href="m_edit.php" target="_blank"><img src="{if $mheadImg} {$mheadImg} {else} images/detail_avatar.jpg {/if}" alt=""></a>
        <div class="follow-info">
            <h4><a href="m_edit.php" target="_blank">{$mname}</a></h4>
            <h5><a href="exit.php">退出</a></h5>
        </div>  
    </div>
    <div class="manager-nav">
        <ul>
            {if $mid==1}
            <li class="nav1 {if $title=='m_list'}on{/if}"><a href="m_list.php">管理员管理</a></li>
            {/if}
            <li class="nav1 {if $title=='u_list'}on{/if}"><a href="u_list.php">用户管理</a></li>
            <li class="nav1 {if $title=='list'}on{/if}"><a href="list.php">启事管理</a></li>
            <li class="nav1 {if $title=='pull'}on{/if}"><a href="pull_list.php">匹配推送</a></li>
            <li class="nav1 {if $title=='answer'}on{/if}"><a href="a_list.php">回答验证</a></li>
            <li class="nav1 {if $title=='thank'}on{/if}"><a href="t_list.php">感谢信管理</a></li>
            <li class="nav1 {if $title=='note'}on{/if}"><a href="n_list.php">公告管理</a></li>
            <li class="nav1 {if $title=='leave'}on{/if}"><a href="leave_list.php">留言管理</a></li>
            <li class="nav1 {if $title=='renling'}on{/if}"><a href="rl_list.php">认领管理</a></li>
        </ul>
        
    </div>
</div>