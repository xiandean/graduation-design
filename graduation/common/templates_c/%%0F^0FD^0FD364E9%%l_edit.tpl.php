<?php /* Smarty version 2.6.29, created on 2016-03-19 21:41:55
         compiled from admin/l_edit.tpl */ ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="校园，寻物，招领，启事，失主，物主，匹配" />
<meta name="description" content="找啊找东西寻物网，致力于为校园寻物以及失物招领提供信息发布平台，同时通过快速的站内信息匹配推送，提高失物信息传播效率以及失物找回率，是失物寻找的好帮手。" />
<title>编辑启事</title>
<link rel="stylesheet" type="text/css" href="../common/templates/admin/css/mstyle.css"  />

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
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/sideBar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div class="rightpart">
        <div class="breadpiece">
            <a href="index.php">首页</a><span> > </span><a href="list.php">启事列表</a><span> > </span><a class="on">启事编辑</a>
        </div>


        <div class="pub-wrap">
            <form id="form2" action="../common/uploadImg.php" method="post"  enctype="multipart/form-data" target="frame">
                <p style="display:none;" ><input  type="file" name="file"  id="upload_file"></p>
            </form>     
            <form  id="form" method="post" action="ajaxApi/reset_lost.php?type=<?php echo $this->_tpl_vars['type']; ?>
&l_id=<?php echo $this->_tpl_vars['l_id']; ?>
&u_id=<?php echo $this->_tpl_vars['lostinfo'][0]['u_id']; ?>
">
            <div  class="step1" id="step1">
                <div class="sub-title">
                    <h2>失物基本信息</h2>
                </div>
                    

                    <ul>
                    <li class="list"><span class="tt"><em>*</em>启事类型</span>
                            <span class="items" id="type_wrap">
                                <input type="hidden" name="type"  value="<?php echo $this->_tpl_vars['type']; ?>
" />
                                <a href="javascript:" data-id='0'>失物招领</a>
                                <a href="javascript:" data-id='1'>寻物启事</a>     
                            </span>
                        </li>   
                        <li><span class="tt"><em>*</em>物品名称</span><input type="text" name="l_name" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_name']; ?>
" /></li>      
                        <li class="list"><span class="tt"><em>*</em>物品类别</span>
                            <span class="items" id="field_wrap">
                                <input type="hidden" name="l_class"  value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_class']; ?>
" />
                                <a href="javascript:" data-id='1'>证件</a>
                                <a href="javascript:" data-id='2'>电子产品</a>     
                                <a href="javascript:" data-id='3'>学习用品</a> 
                                <a href="javascript:" data-id='4'>衣物</a>
                                <a href="javascript:" data-id='5'>箱包</a>
                                <a href="javascript:" data-id='6'>宠物</a>
                                <a href="javascript:" data-id='7'>其他</a>
                            </span>
                        </li>
                        <li><span class="tt"><em>*</em>物品特征</span><input type="text" name="l_feature" placeholder="不超过15个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_feature']; ?>
" /></li> 
                        <li ><span class="tt"><em>*</em>详情描述</span>
                            <textarea name="l_desc" id="vision" placeholder="建议160－200字，最多不超过260字"><?php echo $this->_tpl_vars['lostinfo'][0]['l_desc']; ?>
</textarea>
                        </li> 
 
                        <li ><span class="tt">物品图片</span>
                            <span class="pro-pic">                   
                               
                                <span class="pic-wrap"><img id="msg" src="<?php if ($this->_tpl_vars['lostinfo'][0]['l_img']): ?><?php echo $this->_tpl_vars['lostinfo'][0]['l_img']; ?>
<?php else: ?>../common/templates/images/wutu.jpg<?php endif; ?>" /></span>
                                <input type="hidden" name="imgpath" value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_img']; ?>
">
                                <span class="tip" style="width:146px;margin-left:0;" >
                                建议图片尺寸370*280，格<br />式支持Jpg，图片大小不得<br />超过1M    
                                <span class="pub-btn" style="right:26px;"><a href="javascript:">上传图片</a></span>
                                </span>
                                
                            </span>  
                            <div class="clear"></div>     
                        </li>
                        <li><span class="tt"><em>*</em>丢失/拾获地点</span><input type="text" name="l_place" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_place']; ?>
" /></li>     
                        <li><span class="tt"><em>*</em>丢失/拾获时间</span><input type="text" name="l_date" onClick="WdatePicker()" placeholder="请选择丢失日期" value="<?php echo $this->_tpl_vars['lostinfo'][0]['l_date']; ?>
" /></li>  
                        
                    </ul>

                    <div class="sub-title">
                        <h2>联系方式</h2>
                    </div>
                

                    <ul>
                        <li><span class="tt"><em>*</em>姓名</span><input type="text" name="u_name" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['u_name']; ?>
"/></li>       
                        <li><span class="tt"><em>*</em>手机号码</span><input type="text" name="u_phone" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['u_phone']; ?>
" /></li>       
                        <li><span class="tt"><em>*</em>邮箱</span><input type="text" name="u_email" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['u_email']; ?>
" /></li>     
                        <li><span class="tt"><em>*</em>联系地址</span><input type="text" name="u_address" placeholder="不超过14个字" value="<?php echo $this->_tpl_vars['lostinfo'][0]['u_address']; ?>
" /></li>         
                        <li class="list"><span class="tt"><em>*</em>显示方式</span>
                            <span class="items" id="stage_wrap">
                                <input type="hidden" name="ct_state"  value="<?php echo $this->_tpl_vars['lostinfo'][0]['ct_state']; ?>
"/>
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
                            <textarea name="question[]"  placeholder="不超过50个字" ></textarea>
                        </li>
                        <li><span class="tt"><em>*</em>答案：</span><input type="text" name="answer[]" class="answer" placeholder="不超过14个字" /></li>  
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
                <?php unset($this->_sections['key']);
$this->_sections['key']['name'] = 'key';
$this->_sections['key']['loop'] = is_array($_loop=$this->_tpl_vars['lostinfo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <div class="person bg">
                    <ul>
                        <li><span class="tt"><em>*</em>问题：</span>
                            <textarea name="question[]" placeholder="不超过50个字" ><?php echo $this->_tpl_vars['lostinfo'][$this->_sections['key']['index']]['question']; ?>
</textarea>
                        </li>
                        <li><span class="tt"><em>*</em>答案：</span><input type="text" name="answer[]" class="answer" value="<?php echo $this->_tpl_vars['lostinfo'][$this->_sections['key']['index']]['answer']; ?>
" placeholder="不超过14个字" /></li>  
                        <li class="list"><span class="tt"><em>*</em>答案验证模式</span>
                            <span class="items answer_wrap" id="answer<?php echo $this->_sections['key']['index']+1; ?>
_wrap">
                                <input type="hidden" name="answer_type[]"  value="<?php echo $this->_tpl_vars['lostinfo'][$this->_sections['key']['index']]['answer_type']; ?>
"/>
                                <a href="javascript:;" data-id='0' class="only_btn1">准确回答</a><span>（此模式下，用户答案必须与标准答案完全一致才视为正确。）</span><br>
                                <a href="javascript:;" data-id='1' class="simi_btn1">模糊匹配</a><span>（此模式下，系统将自动匹配用户答案，答案高度相似则视为正确。）</span>
                            </span>
                        </li>
                    </ul>
                    <?php if ($this->_sections['key']['index'] > 0): ?>
                    <div class="person-close"><a href="javascript:"><img src="../common/templates/images/close2.png"></a></div>
                    <?php endif; ?>
                 </div>
                 <?php endfor; endif; ?>
                
                 
                 <div class="add-btn"><a href="javascript:">增加验证问题</a></div>
            </div>

                    
               


                <div class="btn">
                    <div class="next-btn"><a id="showStep2" class="submit" href="javascript:">修改</a></div>
                    <div class="save-btn"><a href="javascript:" onclick="window.location.reload()">取消</a></div>
                </div>
            </div>


                
            </form>

                
            </div>
    </div>

</div>


<script type="text/javascript" src="../common/templates/admin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../common/templates/admin/js/Date/WdatePicker.js"></script>
<script type="text/javascript" src="../common/templates/admin/js/l_edit.js"></script>

</body>
</html>