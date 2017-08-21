$(function(){
    (function($){
        var $type=$('input[name="type"]');
        var $l_name=$('input[name="l_name"]');
        var $l_class=$('input[name="l_class"]');
        var $l_feature=$('input[name="l_feature"]');
        var $l_desc=$('textarea[name="l_desc"]');
        var $l_place=$('input[name="l_place"]');
        var $l_date=$('input[name="l_date"]');
        var $u_name=$('input[name="u_name"]');
        var $u_phone=$('input[name="u_phone"]');
        var $u_address=$('input[name="u_address"]');
        var $ct_state=$('input[name="ct_state"]');
        var $u_email=$('input[name="u_email"]');
        var $l_img=$('input[name="imgpath"]');
        $('.submit').on('click',function(){
            var $question=$('textarea[name="question[]"]');
            var q_arr=[];
            $question.each(function(index,element){
                if(index>0)
                    q_arr[index-1]=$(this).val();
            });
            var $answer=$('input[name="answer[]"]');
            var a_arr=[];
            $answer.each(function(index,element){
                if(index>0)
                    a_arr[index-1]=$(this).val();
            });
            var $answer_type=$('input[name="answer_type[]"]');
            var at_arr=[];
            $answer_type.each(function(index,element){
                if(index>0)
                    at_arr[index-1]=$(this).val();
            });
            // alert(at_arr.length);
           
            var user={
                type:$type.val(),
                l_name:$l_name.val(),
                l_class:$l_class.val(),
                l_feature:$l_feature.val(),
                l_desc:$l_desc.val(),
                l_place:$l_place.val(),
                l_date:$l_date.val(),
                u_name:$u_name.val(),
                u_phone:$u_phone.val(),
                u_email:$u_email.val(),
                u_address:$u_address.val(),
                ct_state:$ct_state.val(),
                l_img:$l_img.val(),
                question:q_arr,
                answer:a_arr,
                answer_type:at_arr
            };
            if(user.type==''){
                alert('请选择启事类型！');
                $(document).scrollTop($('#type_wrap').offset().top-80);
                return false;
            }
            if(user.l_name==''){
                alert('请输入物品名称！');
                $l_name.focus();
                return false;
            }
            if(user.l_class==''){
                alert('请选择物品类别！');
                $(document).scrollTop($('#field_wrap').offset().top-80);
                return false;
            }
            if(user.l_feature==''){
                alert('请输入物品特征！');
                $l_feature.focus();
                return false;
            }
            if(user.l_desc==''){
                alert('请输入详情描述！');
                $l_desc.focus();
                return false;
            }
            if(user.l_date==''){
                alert('请输入丢失/拾获物品时间！若不确定，则输入最后一次看见该物品的时间 ');
                $l_date.focus();
                return false;
            }
            if(user.u_name==''){
                alert('请输入联系人姓名！');
                $u_name.focus();
                return false;
            }
            if(user.u_phone==''){
                alert('请输入手机号码！');
                $u_phone.focus();
                return false;
            }else{
                var re=/^((1[3|4|5|8])[0-9]{9})$/;
                if(!re.test(user.u_phone)){
                    alert('手机号码不正确！');
                    $u_phone.focus();
                    return false;
                }
            }
            if(user.u_email!=''){
                var re=/^\w+@[a-z0-9]+\.[a-z]{2,4}$/;
                if(!re.test(user.u_email)){
                    alert('邮箱地址不正确！');
                    $u_email.focus();
                    return false;
                }
            }
            if(user.u_address==''){
                alert('请输入联系人地址！');
                $u_address.focus();
                return false;
            }
            if(user.ct_state==''){
                alert('请选择显示方式！');
                $(document).scrollTop($('#stage_wrap').offset().top-80);
                return false;
            }else if(user.ct_state==1){
                var flag=true;
                $question.each(function(index,element){
                    if(index>0 && $(this).val()==''){
                        alert('请输入验证问题！');
                        $(this).focus();
                        flag=false;
                        return false;
                    };
                    if(index>0 && $answer.eq(index).val()==''){
                        alert('请输入问题答案！');
                        $answer.eq(index).focus();
                        flag=false;
                        return false;
                    }
                    if(index>0 && $answer_type.eq(index).val()==''){
                        alert('请选择验证方式！');
                        $(document).scrollTop($('.answer_wrap').eq(index).offset().top-80);
                        flag=false;
                        return false;
                    }
                });
                if(!flag){ return false;}
                
            }
            if(!confirm('确定修改吗？')){
                return false;
            }
            $.ajax({
                type:"post",
                url:$('#form').attr('action'),
                data:user,
                dataType:"json",
                success:function(data){
                    if(data.error==0){
                        alert('修改成功!'); 
                        window.location.href="ucenter.php?p=list&action=working";
                    }else if(data.error==1){
                        alert('对不起！修改失败！');
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
        });
    })(jQuery);

// 上传头像
    (function($){

        var $file=$('#upload_file');
        var $form=$('#form2');
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
        $('.pub-btn').click(function(){
            $file.click();
        });
    })(jQuery);
});

// 上传头像 回调函数
function stopSend(str){
    $('input[name="imgpath"]').val(str);
    $('#msg').attr("src",str);
}

$(function(){  

//页面初始化
(function($){

    $('.pic-wrap').mouseover(function(){
        $(this).children('.shade').show();
    });
    $('.pic-wrap').mouseout(function(){
        $(this).children('.shade').hide();
    });
    $('.close').click(function(){
        $(this).parents('.pic-wrap').remove();
    });
    $('.del-book').click(function(){
        $(this).parent().remove();
    });
    $('.person-close').click(function(){
        $(this).parents('.person').remove();
    });
    $('.add-btn').click(function(){
        var new_person=$('#person0').clone(true);
        new_person.attr('id','');
        new_person.find('#answer0_wrap').attr('id','answer'+$('.answer_wrap').length+'_wrap');
        new_person.show();
        $(this).before(new_person);
        singleCheck('answer'+($('.answer_wrap').length-1)+'_wrap');
    });
    $('#v_btn').on('click',function(){
        if($(this).hasClass('active')){
            $('#step2').show();
        }else{
            $('#step2').hide();
        }
        
    });
    $('#p_btn').on('click',function(){
        $('#step2').hide();
    });
})(jQuery)

});

function singleCheck(name){
    var items=document.getElementById(name).getElementsByTagName('a');
    var val=document.getElementById(name).getElementsByTagName('input')[0];
    for( var i=0;i<items.length; i++){
        if(items[i].getAttribute('data-id')==val.value){
            items[i].className="active";
        };
        items[i].onmouseover=function(){
                $(this).addClass('on');     
            }
        items[i].onmouseout=function(){
                $(this).removeClass('on');          
            }
        items[i].onclick=function(){
            $(this).removeClass('on');
            if(this.className=="active"){
                this.className="";  
                val.setAttribute('value',"");
            }else{
                for(var j=0;j<items.length;j++){
                    items[j].className="";
                }
                this.className="active";
                val.setAttribute('value',this.getAttribute('data-id'));
            }
        }
    }
}
function multiCheck(name){
    if(!document.getElementById(name)){
        return false;
    }
    var items=document.getElementById(name).getElementsByTagName('a');
    var val=document.getElementById(name).getElementsByTagName('input')[0];
    for( var i=0;i<items.length; i++){
         if(items[i].getAttribute('data-id')==val.value){
            items[i].className="active";
        };
        items[i].onmouseover=function(){
                $(this).addClass('on');     
            }
        items[i].onmouseout=function(){
                $(this).removeClass('on');          
            }
        items[i].onclick=function(){
            $(this).removeClass('on');
            var value="";
            if(this.className=="active"){
                this.className="";  
            }else{
                this.className="active";
            }
            for(var j=0;j<items.length;j++){
                if( items[j].className=="active"){
                    if(value!=""){
                        value=value+","+items[j].getAttribute('data-id');
                    }else{value=items[j].getAttribute('data-id');}
                }
            }
            val.setAttribute('value',value);
        }
    }
    
}
function checkboxClick( checkbox,checkbox_index){
    var items=document.getElementById(checkbox);
    var val=document.getElementById(checkbox_index);
    items.onclick = function() {
                if(this.checked) {
                    //alert("选中");
                    val.setAttribute('data',"1");
                }
                else {
                    //alert("未选中");
                    val.setAttribute('data',"0");          
                }
    }
}
singleCheck("stage_wrap");
singleCheck("type_wrap");
/*singleCheck("source_wrap");
singleCheck("status_wrap");*/
singleCheck("field_wrap");
for(var i=1;i<$('.answer_wrap').length;i++){
    singleCheck("answer"+i+"_wrap");
}

if($('#v_btn').hasClass('active')){
    $('#step2').show();
}
/*checkboxClick("checkbox1","checkbox1_index");
checkboxClick("checkbox2","checkbox2_index");*/