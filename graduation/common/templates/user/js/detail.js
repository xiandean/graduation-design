$(function(){  

(function($){

    $('#ok').on('click',function(){
    		$.ajax({
                type:"post",
                url:"ajaxApi/checkAnswer.php",
                data:{action:'checked',l_id:$('#ok').attr('data-id'),l_type:$('#ok').attr('data-type')},
                dataType:"json",
                success:function(data){
                    if(data.error==0){
                        //alert('已保存至“个人中心－等待验证”!');  
                        window.location.href="ucenter.php?p=list&action=waiting";  
                    }else if(data.error==10){
                        alert(data.msg);
                    }else if(data.error==999){
                        alert(data.msg);
                    }else{
                    	console.log(data);
                    }
                },
                error:function(data){
                    console.log('fail');
                    console.log(data);
                }
            });
            return false;
    });
    $('.answer-submit').on('click',function(){
    		var $id=$('.q_id');
            var $answer=$('input[name="answer[]"]');
            var id_arr=[];
            $id.each(function(index,element){
                id_arr[index]=$(this).attr('data-id');
            });
            var $answer=$('input[name="answer[]"]');
            var answer_arr=[];
            var flag=true;
            $answer.each(function(index,element){
                answer_arr[index]=$(this).val();
                if(answer_arr[index]==''){
  	            	alert('请输入验证答案！');
	                $(this).focus();  
	                flag=false;    
	                return false;        	
                }
            });
            if(!flag){ return false;}
            var user={
                q_id:id_arr,
                answer:answer_arr,
                action:"question"
            };
            
            $.ajax({
                type:"post",
                url:"ajaxApi/checkAnswer.php",
                data:user,
                dataType:"json",
                success:function(data){
                    if(data.error==0){
                        //alert('验证通过!');  
                        //window.location.href="ucenter.php?p=list&action=waiting";  
                        //window.location.reload();
                        $('.contact_info').hide();
                        $('.checked_box').show();
                    }else if(data.error==1){
                        alert(data.msg);
                    }else if(data.error==2){
                        alert('请登陆后再进行验证！');
                    }else if(data.error==4){
                        alert('回答已超过限制次数！');
                    }else if(data.error==10){
                        alert(data.msg);
                    }else if(data.error==999){
                        alert(data.msg);
                    }
                    console.log(data);
                },
                error:function(data){
                    console.log('fail');
                    console.log(data);
                }
            });
            return false;
        });
		                                             /*评论及问题验证框显示*/
		$("#tosay").click(function(){
            $('.mask').show();
            $('#saying').show();
        })
        $("#torl").click(function(){
        	$('.mask').show();
            $('.contact_info').show();
        })
        $("#cancle").click(function(){
            $('.contact_info').hide();
            $('.mask').hide();
            $("#torl").show();
        })
        $("#cancle-rl").click(function(){
            $('.checked_box').hide();
            $('.mask').hide();
            // $("#torl").show();
        })
        $("#cancle-lv").click(function(){
            $('.mask').hide();
            $('#saying').hide();
        })
        $(".canclelogin").click(function(){
            $('.contact_info').hide();
            $('.mask').hide();
            $('#saying').hide();
        })
		$("#said").click(function(){
			var $this=$(this);
            var xs_context=$('textarea[name="xs_context"]').val();
            if(!xs_context){
                alert('请输入线索内容！');
                $('textarea[name="xs_context"]').focus();
                return false;
            }
            var l_id=$(this).attr('data-id');
            var l_type=$(this).attr('data-type');
            var user={
                l_id:l_id,
                l_type:l_type,
                action:"post",
                xs_context:xs_context
            };
            
            $.ajax({
                type:"get",
                url:"ajaxApi/check_xs.php",
                data:user,
                dataType:"json",
                success:function(data){
                    if(data.error==0){
                        alert('提交成功!');  
                        $this.parent().hide();
                        $('.mask').hide();
                        //window.location.href="ucenter.php?p=list&action=waiting";  
                        //window.location.reload();
                        
                    }else if(data.error==10){
                        alert(data.msg);
                    }else if(data.error==999){
                        alert(data.msg);
                    }else{
                        alert('提交失败!');  
                    }
                    console.log(data);
                },
                error:function(data){
                    console.log(data);
                }
            });
        });

		$("#toanswer").click(function(){
			$('.mask').show();
            $('#question').show();
        })
		// $("#answered").click(function(){
  //           $('#question').hide();
  //       })
})(jQuery)



});