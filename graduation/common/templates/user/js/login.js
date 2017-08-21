$(function(){

    (function($){
        var $name=$('input[name="name"]');
        var $psw1=$('input[name="password"]');
        var $psw2=$('input[name="password2"]');
        var $auto=$('input[name="auto"]');
        var $code=$('input[name="code"]');
        getCode();
        $('#reCode').on('click',function(){
            getCode();
        });
        $('.submit').on('click',function(){
            if($name.val()==''){
                alert('请输入用户名！');
                return false;
            }
            if($psw1.val()==''){
                alert('请输入密码！');
                return false;
            }
            if($code.val()==''){
                alert('请输入验证码！');
                return false;
            }
            $.ajax({
                type:"post",
                url:"ajaxApi/checkLogin.php",
                data:$("form").serialize(),
                dataType:'json',
                success:function(data){
                    if(data.error==0){
                        // alert('登陆成功！');
                        window.history.back();
                    }else if(data.error==1){
                        alert('用户名或密码不对！');
                        getCode();
                    }else if(data.error==2){
                        alert(data.msg);
                        getCode();
                    }else if(data.error==10){
                        alert(data.msg);
                    }
                },
                error:function(data){
                	console.log(data);
                }
            });
            return false;
        });
    })(jQuery);
    var num=0;
    function getCode(){
        
        $('#imgcode').attr('src',"validatorCode.php?");
     }
});