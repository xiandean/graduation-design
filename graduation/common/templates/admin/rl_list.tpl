<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>认领记录</title>
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
			<a href="index.php">首页</a><span> > </span><a class="on">认领记录列表</a>
		</div>

		<form action="" method="get">
            <ul class="sub-search clearfix">
            <select id="select0">
                <option value="0" {if !$opt}selected="selected"{/if}>不限</option>
                <option value="1" {if $opt==1}selected="selected"{/if}>物品名称</option>
                <option value="2" {if $opt==2}selected="selected"{/if}>物品特征</option>
                <option value="3" {if $opt==3}selected="selected"{/if}>认领用户id</option>
                <option value="4" {if $opt==4}selected="selected"{/if}>发布用户id</option>
            </select> 
            <input type="hidden" name="opt" id='opt' value="">
            <input type="text" class="sub-keywords" style="margin-left:10px;" value="{$keyword}" name="keyword">
            <input type="submit" class="select-btn thank submit"  value=" 搜 索 ">
            </ul>
            <ul class="sub-search clearfix">
            <span>启事类型：</span>
            <select id="select1">
                <option value="1"  {if $type==1}selected="selected"{/if}>所有启事</option>
                <option value="2"  {if $type==2}selected="selected"{/if}>寻物启事</option>
                <option value="3"  {if $type==3}selected="selected"{/if}>招领启事</option>
            </select> 
            <input type="hidden" id="type" name="type" value="" />
            
            <span>认领日期：</span>
            <input name="date1" value="{$date1}" type="text" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5><span style="padding:0 5px;">至</span><input name="date2" type="text" value="{$date2}" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5>
            <span>关键字：</span>
            <input type="text" class="sub-keywords" value="{$keys}" name="sub-keywords"/>
            <input type="submit" class="select-btn thank" value=" 筛 选 "/>
            </ul>
        </form>
		<div class="list">
			<div class="notices">
                <table cellpadding="5" cellspacing="1">
                <!--<caption>启事列表</caption>-->
                <thead>
                <tr>
                    <th>启事类型</th>
                    <th>物品名称</th>
                    <th>物品特征</th>
                    <th>认领用户id</th>
                    <th>发布用户id</th>
                    <th>认领日期</th> 
                    <th>选 择</th>
                </tr>
                </thead>
                <tbody>
                    {section name=key loop=$page.list}
                    <tr {if $smarty.section.key.index % 2==0}class="hui"{/if}>
                        <td>{if $page.list[key].type==0}寻物{else}招领{/if}</td>
                        <td>{$page.list[key].l_name}</td>
                        <td class="feature">{$page.list[key].l_feature}</td>
                        <td><a href="u_edit.php?id={$page.list[key].rl_uid}" target="_blank">{$page.list[key].rl_uid}</a></td>
                        <td><a href="u_edit.php?id={$page.list[key].u_id}" target="_blank">{$page.list[key].u_id}</a></td>
                        <td>{$page.list[key].rl_date}</td>
                        
                        <td><input type="checkbox" name=list[] data-mid="{$page.list[key].id}" data-type={if $page.list[key].type==0}1{else}0{/if} /></td>
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
                <a class="{$value.class}" href="{$keywords}&page={$value.pageIndex}">{$value.text}</a>
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
<script type="text/javascript" src="../common/templates/admin/js/rl_list.js"></script>

</body>

</html>