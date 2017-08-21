<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>启事大厅</title>

<link rel="stylesheet" href="../common/templates/user/css/style.css">

</head>
<body>
                          
<!-- 页面导航 -->
{include file="user/topBar.tpl"}
<!-- /页面导航 -->

<!--搜索区-->
<div class="section search">
    <div class="wrapper">
        <form action="search.php" method="get">
            <div class="search-box">
                
                <input class="search-input" type="text" id="search" name="keywords" value="{$keys}" />

                <input class="search-submit" type="submit" value="搜索" />
                <input class="search-submit2 {if $sub}active{/if}" type="button" value="高级搜索" />
                <div class="usually">
                    <span class="tt a-type1">常用关键字 : </span>
                    <span class="select">
                        <a href="" target="_blank">手机</a>
                        <a href="" target="_blank">钱包</a>
                        <a href="" target="_blank">校园卡</a>
                        <a href="" target="_blank">银行卡</a>
                        <a href="" target="_blank">学生证</a>
                        <a href="" target="_blank">雨伞</a>
                        <a href="" target="_blank">教材</a>
                        <a href="" target="_blank">水壶</a>
                        <a href="" target="_blank">钥匙</a>
                        <a href="" target="_blank">电脑</a>
                        <a href="" target="_blank">耳机</a>
                        <a href="" target="_blank">U盘</a>
                        <a href="" target="_blank">身份证</a>
                        <a href="" target="_blank">背包</a>
                    </span>
                </div>
            </div>
        </form>
        <form action="search.php" method="get">
            <ul class="sub-search clearfix" {if !$sub}style="display:none;"{/if}>
            <span>启事类型：</span>
            <select id="select1">
                <option value="1">所有启事</option>
                <option value="2" selected="selected">寻物启事</option>
                <option value="3">招领启事</option>
            </select> 
            <input type="hidden" id="type" name="type" value="" />
            <span>失物类别：</span>
            <select id="select2">
                <option value="0" {if $class==0}selected="selected"{/if}>不限</option>
                <option value="1" {if $class==1}selected="selected"{/if}>证件</option>
                <option value="2" {if $class==2}selected="selected"{/if}>电子产品</option>
                <option value="3" {if $class==3}selected="selected"{/if}>学习用品</option>
                <option value="4" {if $class==4}selected="selected"{/if}>衣物</option>
                <option value="5" {if $class==5}selected="selected"{/if}>箱包</option>
                <option value="6" {if $class==6}selected="selected"{/if}>宠物</option>
                <option value="7" {if $class==7}selected="selected"{/if}>其他</option>
            </select>
             <input type="hidden" id="class" name="class" value="" />
            <span>丢失日期：</span>
            <input name="date1" value="{$date1}" type="text" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5><span style="padding:0 5px;">至</span><input name="date2" type="text" value="{$date2}" class="Wdate" onClick="WdatePicker()" size=6 maxlength=5>
            <span>关键字：</span>
            <input type="text" class="sub-keywords" value="{$keys}" name="sub-keywords"/>
            <input type="submit" class="select-btn thank" value=" 筛 选 "/>
            </ul>
        </form> 
    </div>
</div>

<div class="section programs page-container" style="height:auto;">
	<div class="wrapper clearfix">
        <div class="section-programs">
            <h1 class="title-bar">寻物启事</h1>  
            <div class="news-list">
            	<div class="news-list-nav">                                              
            		<a {if $classId==0}class="on"{/if} href="?class=all">全部</a>
                    <a {if $classId==1}class="on"{/if} href="?class=1">证件</a>
                    <a {if $classId==2}class="on"{/if} href="?class=2">电子产品</a>
                    <a {if $classId==3}class="on"{/if} href="?class=3">书籍</a>
                    <a {if $classId==4}class="on"{/if} href="?class=4">衣服</a>
                    <a {if $classId==5}class="on"{/if} href="?class=5">箱包</a>
                    <a {if $classId==6}class="on"{/if} href="?class=6">宠物</a>
                    <a {if $classId==7}class="on"{/if} href="?class=7">其他</a>
            	</div>
                {if !$page.list}<p style="padding-left:20px; line-height:30px;">暂无相关启事！</p>{else}  
                <p style="padding-left:20px;line-height:30px;">共有{$page.count}条记录，分{$page.pageTotal}页，每页{$page.pageRows}条，当前页为{$page.pageNow}。</p>
                <ul class="clearfix">
                {section name=key loop=$page.list}
                    <li>
                        <a href="detail.php?type=lost&l_id={$page.list[key].l_id}" target="_blank"><img src="{if $page.list[key].l_img}{$page.list[key].l_img}{else}../common/templates/images/wutu.jpg{/if}" alt=""></a>
                        <div class="programs-info">
                            <h2><span class="a-type1">[寻物] </span><a href="detail.php?type=lost&l_id={$page.list[key].l_id}" class="a-type1" target="_blank">{$page.list[key].l_name}</a></h2>
                            <div class="author">
                                <p class="a-type1" style="height:20px; overflow:hidden;">特征 : {$page.list[key].l_feature}</p>
                                <p style="height:54px;">{$page.list[key].l_desc|smartTruncate:50:"..."}</p>
                                <p style="padding-top:4px;">
                                    <span class="time">{$page.list[key].p_date}</span>
                                </p>
                            </div>
                            <div class="vote"><a target="_blank" href="detail.php?type=lost&l_id={$page.list[key].l_id}">查看详情</a></div>
                        </div>
                    </li>
                {/section}
                </ul>
                
                {if $page.pageTotal>1}
                    <div class="pager">
                    {foreach from=$page.pageNav key=i item=value}
                        <a class="{$value.class}" href="?{$classPara}page={$value.pageIndex}">{$value.text}</a>
                    {/foreach}
                    </div>
                {/if}
            {/if}
            </div>
        </div>   
        
    </div>
</div>



<!-- 页面导航 -->
{include file="user/footBar.tpl"}
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/Date/WdatePicker.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/list_lost.js"></script>


</body>
</html>