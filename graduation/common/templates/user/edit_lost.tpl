<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="ie8"><![endif]-->
<!--[if lt IE 7 ]><html class="ie6"><![endif]-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>编辑启事</title>
<link rel="stylesheet" type="text/css" href="../common/templates/user/css/style.css"  />

</head>
<body>
                            
<!-- 页面导航 -->
{include file="user/topBar.tpl"}
<!-- /页面导航 -->

<div class="nav1" id="nav1" style="height:20px;"></div>
<div class="pub-wrap">
<form id="form2" action="../common/uploadImg.php" method="post"  enctype="multipart/form-data" target="frame">
    <p style="display:none;" ><input  type="file" name="file"  id="upload_file"></p>
</form> 	
<form  id="form" method="post" action="ajaxApi/reset_lost.php?type={$type}&l_id={$l_id}">
<div class="big-title">
    	<img src="../common/templates/images/title.jpg" />
</div>
<div  class="step1" id="step1">
	<div class="sub-title">
    	<h2>失物基本信息</h2>
    </div>
		

    	<ul>
        <li class="list"><span class="tt"><em>*</em>启事类型</span>
                <span class="items" id="type_wrap">
                    <input type="hidden" name="type"  value="{$type}" />
                    <a href="javascript:" data-id='0'>失物招领</a>
                    <a href="javascript:" data-id='1'>寻物启事</a>     
                </span>
            </li>   
    		<li><span class="tt"><em>*</em>物品名称</span><input type="text" name="l_name" placeholder="不超过14个字" value="{$lostinfo[0].l_name}" /></li>   	
            <li class="list"><span class="tt"><em>*</em>物品类别</span>
                <span class="items" id="field_wrap">
                    <input type="hidden" name="l_class"  value="{$lostinfo[0].l_class}" />
                    <a href="javascript:" data-id='1'>证件</a>
                    <a href="javascript:" data-id='2'>电子产品</a>     
                    <a href="javascript:" data-id='3'>学习用品</a> 
                    <a href="javascript:" data-id='4'>衣物</a>
                    <a href="javascript:" data-id='5'>箱包</a>
                    <a href="javascript:" data-id='6'>宠物</a>
                    <a href="javascript:" data-id='7'>其他</a>
                </span>
            </li>
            <li><span class="tt"><em>*</em>物品特征</span><input type="text" name="l_feature" placeholder="如：黑色 皮质 女士钱包" value="{$lostinfo[0].l_feature}" /></li> 
            <li ><span class="tt"><em>*</em>详情描述</span>
                <textarea name="l_desc" id="vision" placeholder="简要说明遗失的时间地点，以及失物重要特征">{$lostinfo[0].l_desc}</textarea>
            </li> 

            <li ><span class="tt">物品图片</span>
                <span class="pro-pic">                   
                   
                    <span class="pic-wrap"><img id="msg" src="{if $lostinfo[0].l_img}{$lostinfo[0].l_img}{else}../common/templates/images/wutu.jpg{/if}" /></span>
                    <input type="hidden" name="imgpath" value="{$lostinfo[0].l_img}">
                    <span class="tip" style="width:146px;margin-left:0;" >
                    建议图片尺寸370*280，格<br />式支持Jpg，图片大小不得<br />超过1M    
                    <span class="pub-btn" style="right:26px;"><a href="javascript:">上传图片</a></span>
                    </span>
                    
                </span>  
                <div class="clear"></div>     
            </li>
            <li><span class="tt"><em>*</em>丢失/拾获地点</span><input type="text" name="l_place" value="{$lostinfo[0].l_place}" /></li>     
            <li><span class="tt"><em>*</em>丢失/拾获时间</span><input type="text" name="l_date" onClick="WdatePicker()" placeholder="请选择丢失日期" value="{$lostinfo[0].l_date}" /></li>  
          	
        </ul>

        <div class="sub-title">
            <h2>联系方式</h2>
        </div>
    

        <ul>
            <li><span class="tt"><em>*</em>姓名</span><input type="text" name="u_name" value="{$lostinfo[0].u_name}"/></li>       
            <li><span class="tt"><em>*</em>手机号码</span><input type="text" name="u_phone" value="{$lostinfo[0].u_phone}" /></li>       
            <li><span class="tt"><em>*</em>邮箱</span><input type="text" name="u_email" value="{$lostinfo[0].u_email}" /></li>     
            <li><span class="tt"><em>*</em>联系地址</span><input type="text" name="u_address" value="{$lostinfo[0].u_address}" /></li>         
            <li class="list"><span class="tt"><em>*</em>显示方式</span>
                <span class="items" id="stage_wrap">
                    <input type="hidden" name="ct_state"  value="{$lostinfo[0].ct_state}"/>
                    <a href="javascript:;" data-id='0' id="p_btn">直接公开</a>
                    <a href="javascript:;" data-id='1' id="v_btn">问题验证</a>
                </span>
            </li>
          
        </ul>
       
<div class="step2" id="step2" style="display:none">
    <div class="sub-title">
            <h2>验证问题</h2>
    </div>
    
    
    <!--空模板-->
     <div id="person0" style="display:none;" class="person bg">
        <ul>
           <li ><span class="tt"><em>*</em>问题：</span>
                <textarea name="question[]" ></textarea>
            </li>
            <li><span class="tt"><em>*</em>答案：</span><input type="text" name="answer[]" class="answer" /></li>  
            <li class="list"><span class="tt"><em>*</em>答案验证模式</span>
                <span class="items answer_wrap" id="answer0_wrap">
                    <input type="hidden" name="answer_type[]"  value=""/>
                    <a href="javascript:;" data-id='0' class="only_btn0">准确回答</a><span>（此模式下，用户答案必须与标准答案完全一致才视为正确。）</span><br>
                    <a href="javascript:;" data-id='1' class="simi_btn0">模糊匹配</a><span>（此模式下，系统将自动匹配用户答案，答案高度相似则视为正确。）</span>
                </span>
            </li> 
        </ul>
        <div class="person-close"><a href="javascript:"><img src="../common/templates/images/close2.png"></a></div>
     </div>
    <!--第一个问题-->
    {section name=key loop=$lostinfo}
    <div class="person bg">
        <ul>
            <li><span class="tt"><em>*</em>问题：</span>
                <textarea name="question[]" placeholder="不超过50个字" >{$lostinfo[key].question}</textarea>
            </li>
            <li><span class="tt"><em>*</em>答案：</span><input type="text" name="answer[]" class="answer" value="{$lostinfo[key].answer}" /></li>  
            <li class="list"><span class="tt"><em>*</em>答案验证模式</span>
                <span class="items answer_wrap" id="answer{$smarty.section.key.index+1}_wrap">
                    <input type="hidden" name="answer_type[]"  value="{$lostinfo[key].answer_type}"/>
                    <a href="javascript:;" data-id='0' class="only_btn1">准确回答</a><span>（此模式下，用户答案必须与标准答案完全一致才视为正确。）</span><br>
                    <a href="javascript:;" data-id='1' class="simi_btn1">模糊匹配</a><span>（此模式下，系统将自动匹配用户答案，答案高度相似则视为正确。）</span>
                </span>
            </li>
        </ul>
        {if $smarty.section.key.index>0}
        <div class="person-close"><a href="javascript:"><img src="../common/templates/images/close2.png"></a></div>
        {/if}
     </div>
     {/section}
    
     
     <div class="add-btn"><a href="javascript:">增加验证问题</a></div>
</div>

    	
   


    <div class="btn">
        <div class="next-btn"><a id="showStep2" class="submit" href="javascript:">修改</a></div>
    	<div class="save-btn"><a href="javascript:" onClick="window.location.reload()">取消</a></div>
    </div>
</div>


  	
</form>

    
</div>

<!-- 页面导航 -->
{include file="user/footBar.tpl"}
<!-- /页面导航 -->
<script type="text/javascript" src="../common/templates/user/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/user/js/Date/WdatePicker.js"></script>
<script type="text/javascript" src="../common/templates/user/js/common.js"></script>
<script type="text/javascript" src="../common/templates/user/js/edit_lost.js"></script>
</body>
</html>
