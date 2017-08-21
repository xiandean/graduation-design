$(function(){
    // 全选
    $(".selectall").bind("click", function () {
        $("[name = list[]]:checkbox").attr("checked", true);
    });
 
    // 全不选
    $(".unselect").bind("click", function () {
        $("[name = list[]]:checkbox").attr("checked", false);
    });
    $('.submit').click(function(){
       
        $('#opt').val($("#select0 option:selected").val());
        $('#type').val($("#select1 option:selected").val());
        $('#class').val($("#select2 option:selected").val());
    });

    $('.select-btn').click(function(){
        // alert($("option:selected").val());
        $('#opt').val($("#select0 option:selected").val());
        $('#type').val($("#select1 option:selected").val());
        $('#class').val($("#select2 option:selected").val());
    });
        
    $('.usually .select a').click(function(){
        $(this).attr('href','search.php?type='+$("#select1 option:selected").val()+'&keywords='+$(this).text());
    });
    $('.search-submit2').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.sub-search').slideUp();
        }else{
            $(this).addClass('active');
            $('input[name="sub-keywords"]').val($('input[name="keywords"]').val());
            $('.sub-search').slideDown();
        }
    })
    $('.delete').click(function(){
        var m=$("input:checked");

        var arr_id=[];
        m.each(function(i){
            arr_id.push($(this).attr('data-mid'));
        });
        if(m.length>0&&(confirm('您确定要删除启事吗？'))){
            var ids=arr_id.join(',');
            $.ajax({
                type:"post",
                url:"ajaxApi/delete.php?action=rl",
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

});