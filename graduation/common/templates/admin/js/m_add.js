$(function(){
    (function($){
        var $name=$('input[name="name"]');
        var $psw1=$('input[name="password"]');
        var $psw2=$('input[name="password2"]');
        var $mobile=$('input[name="phone"]');
        var $email=$('input[name="email"]');
        $('.submit').on('click',function(){
            if($name.val()==''){
                alert('请输入用户名！');
                return false;
            }
            if($psw1.val()==''){
                alert('请输入密码！');
                return false;
            }
            if($psw2.val()==''){
                alert('请再次输入密码！');
                return false;
            }
            if($psw1.val()!=$psw2.val()){
                alert('密码不一致！');
                return false;
            }
            if($mobile.val()==''){
                alert('请输入手机号码！');
                return false;
            }else{
                var re=/^((1[3|4|5|8])[0-9]{9})$/;
                if(!re.test($mobile.val())){
                    alert('手机号码不正确！');
                    return false;
                }
            }
            if($email.val()==''){
                alert('请输入邮箱地址！');
                return false;
            }
            if($email.val()!=''){
                var re=/^\w+@[a-z0-9]+\.[a-z]{2,4}$/;
                if(!re.test($email.val())){
                    alert('邮箱地址不正确！');
                    return false;
                }
            }
            $.ajax({
                type:"post",
                url:"ajaxApi/checkRegist.php",
                data:$("#form2").serialize(),
                dataType:'json',
                success:function(data){
                    if(data.error==0){
                        alert('新增成功!'); 
                        window.location.href="m_list.php";
                    }else if(data.error==1){
                        alert('对不起！新增失败！');
                    }else if(data.error==2){
                        alert('该账户名已存在!'); 
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

// 上传头像
    (function($){

        var $file=$('#upload_file');
        var $form=$('#form');
        var oBtn=false;
        $file.change(function(){
            if($file.val()!=''){
                if(!oBtn){
                    var str='<iframe id="frame" name="frame" width="0" height="0" marginwidth="0" frameborder="0" src="" ></iframe>';
                    $form.append(str);
                }
                oBtn=true;
                $form.submit();
            }
               
        });
        $('.avatar_upload').click(function(){
            $file.click();
        });
    })(jQuery);
});

// 上传头像 回调函数
function stopSend(str){
    $('input[name="imgpath"]').val(str);
    $('#msg').attr("src",str);
}