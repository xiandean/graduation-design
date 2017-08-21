$(function(){  

//页面初始化
(function($){
    
    $('.select-btn').click(function(){
        // alert($("option:selected").val());
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
})(jQuery)



});