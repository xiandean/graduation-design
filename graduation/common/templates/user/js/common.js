$(function(){
	//页面初始化
	(function($){
	    $(".ucenter").mouseenter(function(e){
	        e.preventDefault();
	        $('.uc-menu').show();
	    });
	    $(".ucenter").mouseleave(function(e){
	        e.preventDefault();
	        $('.uc-menu').hide();
	    });
	})(jQuery);

});

$(function(){  

//顶部导航消息
(function($){
    if($('.logined')){
        getmessage();
    }
    function getmessage(){
        $.ajax({
            type:"get",
            url:"ajaxApi/check_message.php",
            data:{},
            dataType:"json",
            success:function(data){
                console.log(data);
                if(data.error==0){ 
                    $('#mutip').show(); 
                    if(data.pull>0){
                        $('#pullnum').html(data.pull); 
                        $('#pull_wrap').show();
                    }else{
                        $('#pull_wrap').hide();
                    }
                    if(data.validation>0){
                        $('#vdnum').html(data.validation);
                        $('#vd_wrap').show(); 
                    }else{
                        $('#vd_wrap').hide(); 
                    }
                    if(data.xs>0){
                        $('#xsnum').html(data.xs);
                        $('#xs_wrap').show(); 
                    }else{
                        $('#xs_wrap').hide(); 
                    }
                    if(data.rl>0){
                        $('#rlnum').html(data.rl);
                        $('#rl_wrap').show(); 
                    }else{
                        $('#rl_wrap').hide(); 
                    }
                    $('#msg-tip').html("您有"+data.count+"条未处理消息").show();
                }else if(data.error==1){
                     $('#mutip').hide(); 
                     $('#pull_wrap').hide();
                     $('#vd_wrap').hide(); 
                     $('#xs_wrap').hide(); 
                     $('#rl_wrap').hide();
                     $('#msg-tip').hide();
                }else if(data.error==10){
                    alert(data.msg);
                }
            },
            error:function(data){
                console.log('fail');
                console.log(data);
            }
        });
    }

   $("#getvalidation").on('click',function(){
        $.ajax({
            type:"get",
            url:"ajaxApi/getValidation.php",
            data:{},
            dataType:"json",
            success:function(data){
                if(data.error==0){  
                    var html='';
                    var type='';
                    var typepara='';
                    var userpara='';
                    var usertype='';
                    var vd=data.validations;
                    console.log(vd);
                    for(var i=0;i<vd.length;i++){
                        if(vd[i-1]&&vd[i-1].l_id==vd[i].l_id&&vd[i-1].u_name==vd[i].u_name&&vd[i-1].type==vd[i].type){}else{
                            type=vd[i].type==1?'[寻物]':'[招领]';
                            typepara=vd[i].type==1?'lost':'found';
                            userpara=vd[i].type==1?'归还':'认领';
                            usertype=vd[i].type==1?'拾主':'失主';
                            html=html+'<li class="vd-title" style="padding-bottom:0; font-size:14px"><h3><span class="a-type1">'+type+'</span><a href="detail.php?type='+typepara+'&l_id='+vd[i].l_id+'" target="_blank" class="a-type2">'+vd[i].l_name+'</a></h3></li><li class="vd-title2" style="padding-bottom:0; font-size:14px"><h3><span class="a-type1">'+userpara+'用户：</span><span class="a-type2">'+vd[i].u_name+'</span></h3></li>';
                        }
                        
                        if(vd[i].u_answer){
                            html=html+'<li><h3>'+vd[i].question+'</h3><input class="answer-input" type="text" value="'+vd[i].u_answer+'"  disabled="disabled" style="margin-top:10px;border-color:#f5f5f5;" /></li>';
                        }else{
                            html+='<li><input class="answer-input" type="text" value="您没设置验证问题"  disabled="disabled" style="margin-top:10px; border-color:#f5f5f5;" /></li>';
                        }
                        if(vd[i+1]&&vd[i+1].l_id==vd[i].l_id&&vd[i+1].u_id==vd[i].u_id&&vd[i+1].type==vd[i].type){}else{
                            html+='<li class="clearfix"  style="padding-top:5px;padding-bottom:20px;border-bottom: solid 1px #dddddd;"><span class="thank vd-confirm" data-rid='+vd[i].r_id+' data-confirm="yes" style="cursor:pointer">是'+usertype+'</span><span class="thank vd-confirm" data-rid='+vd[i].r_id+' data-confirm="no" style="cursor:pointer">不是'+usertype+'</span><span class="thank vd-cancle" style="cursor:pointer">尚未联系我</span></li>'
                        }
                    }  
                    html+='<span class="pop_close"><img src="../common/templates/images/close_btn.png" /></span>';
                   
                    $('.pop_box').html(html);      
                    $('.vd-mask').show();          
                    $('.pop_close').click(function(){
                        $('.vd-mask').hide();
                        getmessage();
                    });
                    $('.vd-cancle').click(function(){
                        var $this=$(this);
                        del($this);
                    });
                    $('.vd-confirm').click(function(){
                        var $this=$(this);
                        var _confirm=$(this).attr('data-confirm');
                        if((_confirm=='yes'&&confirm('您确定该用户是失主/拾主吗？'))||(_confirm=='no'&&confirm('您确定该用户不是失主/拾主吗？'))){
                            var _rid=$(this).attr('data-rid');
                            var _uid=$(this).attr('data-uid');
                            $.ajax({
                                type:"get",
                                url:"ajaxApi/handle_vd.php",
                                data:{confirm:_confirm,r_id:_rid,u_id:_uid},
                                dataType:"json",
                                success:function(data){
                                    if(data.error==0) del($this);
                                    else if(data.error==10){
                                        alert(data.msg);
                                    }
                                    console.log(data);
                                },
                                error:function(data){
                                    console.log(data);
                                }
                            });
                        }
                    });    
                    
                }else if(data.error==10){
                        alert(data.msg);
                    }else{
                    alert('暂无验证信息！')
                    console.log(data);
                }
            },
            error:function(data){
                console.log('fail');
                console.log(data);
            }
        });
    });
    function del($this){
        var $parent=$this.parent();
        var $siblings=$parent.siblings();
        var len=$parent.parent().find('.vd-title').length;
        if(len>1){
            var index=$parent.index();
            for(var i=index-1;i>=0;i--){
                if($siblings.eq(i).hasClass('vd-title')){
                    $siblings.eq(i).remove();
                    break;
                }
                $siblings.eq(i).remove();
            }
            $parent.remove();
        }else if(len==1){
            // $parent.parent().hide();
            $('.vd-mask').hide();
            getmessage();
        }
        
    }
$("#getxs").on('click',function(){
        $.ajax({
            type:"get",
            url:"ajaxApi/check_xs.php",
            data:{"action":"get"},
            dataType:"json",
            success:function(data){
                if(data.error==0){ 
                    var xs=data.xs; 
                    var html='';
                    for(var i=0;i<xs.length;i++){                      
                        type=xs[i].l_type==1?'[寻物]':'[招领]';
                        typepara=xs[i].l_type==1?'lost':'found';
                        html=html+'<li class="vd-title" style="padding-bottom:0; font-size:14px; line-height:24px;"><h3><span class="a-type1">'+type+'</span><a href="detail.php?type='+typepara+'&l_id='+xs[i].l_id+'" target="_blank" class="a-type2">'+xs[i].l_name+'</a><br><span class="a-type1">留言用户：</span><span class="a-type2">'+xs[i].u_name+'('+xs[i].phone+')</span></h3></li>';
                        html+='<li><textarea class="answer-input" disabled="disabled" style="margin-top:10px; height:auto; border-color:#f5f5f5;">'+xs[i].xs_context+'</textarea></li>';
                        html+='<li class="clearfix"  style="padding-top:5px;padding-bottom:20px;border-bottom: solid 1px #dddddd;"><span class="thank xs_confirm" data-action="ignore" data-xsid='+xs[i].xs_id+' style="cursor:pointer">忽略</span><span class="thank xs_confirm" data-action="save" data-xsid='+xs[i].xs_id+' style="cursor:pointer">保存</span></li>';         
                    }  
                    html+='<span class="pop_close"><img src="../common/templates/images/close_btn.png" /></span>';
                    $('.pop_box').html(html);      
                    $('.vd-mask').show();     
                    $('.pop_close').click(function(){
                        $('.vd-mask').hide();
                        getmessage();
                    });
                    $('.xs_confirm').click(function(){
                        var $this=$(this);
                        var action=$this.attr('data-action');
                        var xs_id=$this.attr('data-xsid');
                        $.ajax({
                            type:"get",
                            url:"ajaxApi/check_xs.php",
                            data:{action:action,xs_id:xs_id},
                            dataType:"json",
                            success:function(data){
                                if(data.error==0) del($this);
                                else if(data.error==10){
                                    alert(data.msg);
                                }
                                console.log(data);
                            },
                            error:function(data){
                                console.log(data);
                            }
                        });
         
                    });    
                    console.log(data.xs);
                }else if(data.error==10){
                        alert(data.msg);
                    }else{
                    alert('暂无线索！')
                    console.log(data);
                }
            },
            error:function(data){
                console.log('fail');
                console.log(data);
            }
        });
    });

})(jQuery);


});