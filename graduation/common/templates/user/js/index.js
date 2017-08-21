$(function(){  

//页面初始化
(function($){
    
    $('.select-btn').click(function(){
        // alert($("option:selected").val());
        $('#type').val($("#select1 option:selected").val());
        $('#class').val($("#select2 option:selected").val());
    });
        
    $('.usually .select a').click(function(){
        $(this).attr('href','search.php?type='+$("option:selected").val()+'&keywords='+$(this).text());
    });


    $('.search-submit2').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.sub-search').slideUp();
        }else{
            $(this).addClass('active');
            $('.sub-search').slideDown();
        }
    })
    
    $("#leavemessage").click(function(){
        var content=$('textarea[name="leavemessage"]').val();
        if(content==''){
            alert('请输入留言信息!');
            return false;
        }else{

            $.ajax({
                type:"post",
                url:'ajaxApi/jianyi.php',
                data:{content:content,action:'post'},
                dataType:"json",
                success:function(data){
                    if(data.error==0){
                        alert('感谢您的留言！您的任何意见和建议都将帮助我们为您提供更好的服务！');  /*留言板反馈*/
                    }else if(data.error==1){
                        alert('对不起！提交失败！');
                    }else if(data.error==10){
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
        }
        
    })


})(jQuery)



});