// JavaScript Document
$(document).ready(function(){
		//导航鼠标事件
		$(".nav li").mouseenter(function(){
			$(this).addClass("navhover").siblings("li").removeClass("navhover");
		});
		$(".nav").mouseleave(function(){
			$(".nav li:first").addClass("navhover").siblings("li").removeClass("navhover");
		});
		
		//内容选项卡鼠标事件！
		$(".con-nav>a").mouseenter(function(){
		$(this).stop().addClass("connava").siblings("a").removeClass("connava");
		var indexNO=$(this).index();
		$(".connent>.con ").eq(indexNO).css("display","block").siblings().css("display","none");

           });
	//焦点图滚动广告
	$(".ban-yqbox li").mouseover(function(){
		var index=$(this).index();
		$(".ban-img li").eq(index).show().siblings().hide();
		$(this).addClass("on").siblings().removeClass("on");
	});
});