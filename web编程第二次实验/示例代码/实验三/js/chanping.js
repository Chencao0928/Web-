/**
 * Created by student on 16/12/28.
 */
$(document).ready(function () {
    //导航鼠标事件
    $(".nav li").mouseenter(function(){
        $(this).addClass("navhover").siblings("li").removeClass("navhover");
    });
    $(".nav").mouseleave(function(){
        $(".nav li:first").next().addClass("navhover").siblings("li").removeClass("navhover");
    });
	//-------------------------内容导航---------------------
	$(".c-nav li").mouseenter(function(){
		$(".cp-list li").css('z-index','-1');
	});
	$(".c-nav li").mouseleave(function(){
		$(".cp-list li").css('z-index','1');
	});
    //收藏点击事件
    $(".shoucan").click(function () {
        $(this).addClass("hide").next().addClass("show");
    });
    $(".shoucan2").click(function () {
        $(this).removeClass("show").prev().removeClass("hide");
    });
    //加入购物车点击事件
    $(".jrgwc").click(function () {
        $(this).toggleClass("jrgwcjs");
    });
	//-------------------------------------------------商品详情JS----------------------------
	
	//选项卡事件
	$(".c-b-nav li:first").click(function(){
		$(".xqnr").removeClass("hide").siblings("div").addClass("hide");
	});
	$(".c-b-nav li:first").next().click(function(){
		$(".sppj").removeClass("hide").siblings("div").addClass("hide");
	});
	$(".c-b-nav li:last").click(function(){
		$(".sqhd").removeClass("hide").siblings("div").addClass("hide");
	});
	
	//选择年份事件
	$(".xznf li").click(function(){
		$(this).addClass("xznfhover").siblings("li").removeClass("xznfhover");
	});
	
});