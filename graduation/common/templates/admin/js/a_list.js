$(function(){
    // 全选
    $(".selectall").bind("click", function () {
        $("[name = a[]]:checkbox").attr("checked", true);
    });
 
    // 全不选
    $(".unselect").bind("click", function () {
        $("[name = a[]]:checkbox").attr("checked", false);
    });
    $('.delete').click(function(){
        var u=$("input:checked");
        var arr=[];
        u.each(function(i){
            arr[i]=$(this).attr('data-mid');
        });
        if(arr.length>0&&(confirm('您确定要删除验证吗？'))){
            var ids=arr.join(',');
            $.ajax({
                type:"post",
                url:"ajaxApi/delete.php?action=a",
                data:{ids:ids},
                dataType:'json',
                success:function(data){
                    if(data.error==0){
                        alert('删除成功！');
                        window.location.reload();
                    }else if(data.error==1){
                        alert('删除失败！');
                
                    }else if(data.error==10){
                        alert(data.msg);
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
        
    });

    $('.submit').click(function(){
       
        $('#type').val($("#select1 option:selected").val());
     
    });
});