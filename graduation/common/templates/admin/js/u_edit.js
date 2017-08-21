$(function(){
    (function($){
        var $name=$('input[name="name"]');
        var $mobile=$('input[name="phone"]');
        var $email=$('input[name="email"]');
        var $address=$('input[name="address"]');
        var oldImgPath=$('input[name="imgpath"]').val();
        $('#form2 .submit2').on('click',function(){
            $name.removeAttr('disabled');
            $mobile.removeAttr('disabled');
            $email.removeAttr('disabled');
            $address.removeAttr('disabled');
            $(this).hide();
            $('.avatar p').show();
            $('#form2 .submit').show();
            $('#form2 .reset').show();
        });
        $('#form2 .reset').on('click',function(){
            $name.attr('disabled','disabled');
            $mobile.attr('disabled','disabled');
            $email.attr('disabled','disabled');
            $address.attr('disabled','disabled');
            $(this).hide();
            $('.avatar p').hide();
            $('#form2 .submit').hide();
            $('#form2 .submit2').show();
            $('#msg').attr('src',oldImgPath);
        });
        $('#form2 .submit').on('click',function(){
            if(!confirm('确定要修改吗？')){
                return false;
            }
            if($name.val()==''){
                alert('请输入用户名！');
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
                url:$("#form2").attr('action'),
                data:$("#form2").serialize(),
                dataType:'json',
                success:function(data){
                    if(data.error==0){
                        alert('修改成功!'); 
                        window.location.reload();
                    }else if(data.error==1){
                        alert('修改失败！');
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