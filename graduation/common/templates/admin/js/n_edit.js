$('#submit').click(function(){
    var $title=$('input[name="title"]').val();
    var $content=$('textarea[name="content"]').val();
    if($title==''){
        alert('请输入标题！');
        return false;
    }else if($content==''){
        alert('请输入内容！');
        return false;
    }else if(!confirm('您确定要修改吗？')){
        return false;
    }
});