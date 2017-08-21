<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>感谢信管理</title>
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
            <a href="index.php">首页</a><span> > </span><a class="on">感谢信列表</a>
        </div>

        <form action="" method="get">
            <ul class="sub-search clearfix">
            <select id="select1">
                <option value="0" {if !$type}selected="selected"{/if}>不限</option>
                <option value="1" {if $type==1}selected="selected"{/if}>未审核</option>
                <option value="2" {if $type==2}selected="selected"{/if}>已审核</option>
            </select> 
            <input type="hidden" name="type" id='type' value="">
            <input type="text" class="sub-keywords" style="margin-left:10px;" value="{$keyword}" name="keyword">
            <input type="submit" class="select-btn thank submit"  value=" 搜 索 ">
            </ul>
        </form>
        <div class="list">
            <div class="lmessages">
                <table cellpadding="5" cellspacing="1">
                <thead>
                <tr>
                    <th>标题</th>
                    <th>发布者</th>
                    <th>发布时间</th>
                    <th class="detail">内容</th>
                    <th>状 态</th>
                    <th>选 择</th>
                </tr>
                </thead>
                <tbody>
                    {section name=key loop=$page.list}
                    <tr {if $smarty.section.key.index % 2==0}class="hui"{/if}>
                        <td>{$page.list[key].title}</td>
                        <td>{$page.list[key].u_name}</td>
                        <td>{$page.list[key].p_date}</td>
                        <td class="detail">{$page.list[key].context}</td>
                        <td>{if $page.list[key].checked}已审核{else}未审核{/if}</td>
                        <td><input type="checkbox" name="a[]" data-mid="{$page.list[key].t_id}" /></td>
                    </tr>
                    {/section}
                    
                </tbody>
                </table>
            </div>
            <div class="clearfix">
                
                <a class="delete" href="javascript:;">删除</a>
                <a class="edit check" href="javascript:;" style="margin-left:0;">审核通过</a>
                <a class="edit unselect" style="margin-left:0;" href="javascript:;">全不选</a>
                <a class="edit selectall" href="javascript:;">全选</a>
                
            </div>
        </div>
        {if $page.pageTotal>1}
            <div class="pager" style="margin:30px 0;">
            {foreach from=$page.pageNav key=i item=value}
                <a class="{$value.class}" href="?{if $type!=''}type={$type}&{/if}{if $keyword}keyword={$keyword}&{/if}page={$value.pageIndex}">{$value.text}</a>
            {/foreach}
            </div>
        {/if}
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
<script type="text/javascript" src="../common/templates/admin/js/t_list.js"></script>

</body>

</html>