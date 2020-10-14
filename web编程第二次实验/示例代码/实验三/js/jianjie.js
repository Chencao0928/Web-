// JavaScript Document
$(document).ready(function () {
    /*导航鼠标事件*/
    $(".nav li").mouseenter(function(){
        $(this).addClass("navhover").siblings("li").removeClass("navhover");
    });
    $(".nav").mouseleave(function(){
        $(".nav li:last").prev().prev().addClass("navhover").siblings("li").removeClass("navhover");
    });
	$(".zhankai").click(function(){
		$(".p4").show();
		$(this).hide();
		$(".shouqi").show();
	});
	$(".shouqi").click(function(){
		$(".p4").hide();
		$(".zhankai").show();
		$(this).hide();
	});
});