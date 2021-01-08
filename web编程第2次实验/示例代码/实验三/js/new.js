$(document).ready(function () {
    /*导航鼠标事件*/
    $(".nav li").mouseenter(function(){
        $(this).addClass("navhover").siblings("li").removeClass("navhover");
    });
    $(".nav").mouseleave(function(){
        $(".nav li:last").prev().addClass("navhover").siblings("li").removeClass("navhover");
    });
	//焦点图圆圈鼠标事件
	$(".ban-yq a").mouseenter(function(){
		var index=$(this).index();
		$(".ban-img li").eq(index).show().siblings().hide();
		$(this).addClass("ban-yqa").siblings("a").removeClass("ban-yqa");
	});
	
	//列表模式
	$(".moshi li:first").click(function(){
		$("#newsbox").addClass("hide");
		$("#newlist").removeClass("hide");
	});
	//图文模式
	$(".moshi li:last").click(function(){
		$("#newsbox").removeClass("hide");
		$("#newlist").addClass("hide");
	});
	$(".shouqi1").hide();
	$(".shouqi2").hide();
	$(".shouqi3").hide();
	//展开
	$(".zhankai1").click(function(){
		$(".yczq1").show();
		$(this).hide();
		$(".shouqi1").show();
	});
	$(".shouqi1").click(function(){
		$(".yczq1").hide();
		$(".zhankai1").show();
		$(this).hide();
	});
	//展开
	$(".zhankai2").click(function(){
		$(".yczq2").show();
		$(this).hide();
		$(".shouqi2").show();
	});
	$(".shouqi2").click(function(){
		$(".yczq2").hide();
		$(".zhankai2").show();
		$(this).hide();
	});
	//展开
	$(".zhankai3").click(function(){
		$(".yczq3").show();
		$(this).hide();
		$(".shouqi3").show();
	});
	$(".shouqi3").click(function(){
		$(".yczq3").hide();
		$(".zhankai3").show();
		$(this).hide();
	});
});