//设置菜单栏展开和收起
$(".body_left_list >li >label").on('click',function () {
    var gao = $(this).parent('li').css('max-height');
    if(gao == '1500px'){
        $(this).parent('li').animate({'max-height':'40px'});
        $(this).children('i').css({
            'transform':'rotate(-90deg)'
        })
    }else{
        $(this).parent('li').animate({'max-height':'1500px'});
        $(this).children('i').css({
            'transform':'rotate(0)'
        })
    }
});
//设置四级表格顶部偏移与所在单元格一致
$(".body_left_list >li >ul >li >ul >li").on({
    mouseover: function () {
        var juli = $(this).offset().top;
        $(this).children('ul').css({
            'padding-top':juli
        })
    },
    mouseout: function () {
        //$(".link").hide();
    }

});