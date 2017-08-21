<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>匹配推送管理</title>
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
			<a href="index.php">首页</a><span> > </span><a class="on">匹配推送列表</a>
		</div>

		<form action="" method="get">
            <ul class="sub-search clearfix">
            <select id="select0">
                <option value="0" {if !$opt}selected="selected"{/if}>不限</option>
                <option value="1" {if $opt==1}selected="selected"{/if}>失物名称</option>
                <option value="2" {if $opt==2}selected="selected"{/if}>拾物名称</option>
                <option value="3" {if $opt==3}selected="selected"{/if}>失主</option>
                <option value="4" {if $opt==4}selected="selected"{/if}>拾主</option>
                <option value="5" {if $opt==5}selected="selected"{/if}>相似度高于</option>
            </select> 
            <input type="hidden" name="opt" id='opt' value="">
            <input type="text" class="sub-keywords" style="margin-left:10px;" value="{$keyword}" name="keyword">
            <input type="submit" class="select-btn thank submit"  value=" 搜 索 ">
            </ul>
            
        </form>
		<div class="list">
			<div class="notices">
                <table cellpadding="5" cellspacing="1">
                <!--<caption>启事列表</caption>-->
                <thead>
                <tr>
                    <th>寻物</th>
                    <th>失物特征</th>
                    <th>失主</th>
                    <th>招领</th>
                    <th>拾物特征</th>
                    <th>拾主</th> 
                    <th>相似度</th>
                    <th>选 择</th>
                </tr>
                </thead>
                <tbody>
                    {section name=key loop=$page.list}
                    <tr {if $smarty.section.key.index % 2==0}class="hui"{/if}>
                        <td><a href="l_edit.php?type=1&l_id={$page.list[key].s_id}" target="_blank">{$page.list[key].s_name}</a></td>
                        <td class="feature">{$page.list[key].s_feature}</td>
                        <td><a href="u_edit.php?id={$page.list[key].s_uid}" target="_blank">{$page.list[key].s_uname}</a></td>
                        <td><a href="l_edit.php?type=0&l_id={$page.list[key].r_id}" target="_blank">{$page.list[key].r_name}</a></td>
                        <td class="feature">{$page.list[key].r_feature}</td>
                        <td><a href="u_edit.php?id={$page.list[key].r_uid}" target="_blank">{$page.list[key].r_uname}</a></td>
                        <td>{$page.list[key].similar}</td>
                        <td><input type="checkbox" name=list[] data-mid="{$page.list[key].pull_id}" /></td>
                    </tr>
                    {/section}
                    
                </tbody>
                </table>
            </div>
			<div class="clearfix">
				
				<a class="delete" href="javascript:;">删除</a>
				<a class="edit unselect" style="margin-left:0;" href="javascript:;">全不选</a>
				<a class="edit selectall" href="javascript:;">全选</a>
			</div>
		</div>
		{if $page.pageTotal>1}
            <div class="pager" style="margin:30px 0;">
            {foreach from=$page.pageNav key=i item=value}
                <a class="{$value.class}" href="?{if $opt!=''}opt={$opt}&{/if}{if $keyword}keyword={$keyword}&{/if}page={$value.pageIndex}">{$value.text}</a>
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
<script type="text/javascript" src="../common/templates/admin/js/Date/WdatePicker.js"></script>
<script type="text/javascript" src="../common/templates/admin/js/pull_list.js"></script>

</body>

</html>