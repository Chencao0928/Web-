$(document).ready(function(){
	$("#usr_name").focus(function(){
		$("#chk_name").html("输入用户名");
	});
	$("#usr_name").blur(function(){
		$("#chk_name").html("");
		//检查合法性,先判断输入是否为空，再访问数据库验证是否已经被注册

		if($("#usr_name").val()==""){
			$("#chk_name").html("用户名不能为空！");
		}
		else{
			$.post("chk_name.php",{"usr_name":$("#usr_name").val()},function(data){
			$("#chk_name").html(data);
		});
		}

	});
	//其余输入框类似处理
	$("#usr_pwd").focus(function(){
		//提示输入密码
		$("#chk_pwd").html("输入密码");
	});
	$("#usr_pwd").blur(function(){
		
		//提示不能为空
		if($("#usr_pwd").val()==""){
			$("#chk_pwd").html("密码不能为空！");
		}
		else if($("#usr_pwd").val()!==$("#confirm_pwd").val()){
				$("#chk_confirm_pwd").html("密码不一致！");
			}
		else{
			$("#chk_confirm_pwd").html("√");
			$("#chk_pwd").html("√");
		}
		
		
	});
	$("#confirm_pwd").focus(function(){
		
		//提示确认密码
		$("#chk_confirm_pwd").html("确认密码");
	});
	$("#confirm_pwd").blur(function(){
		//提示是否一致
		if($("#usr_pwd").val()!==$("#confirm_pwd").val()){
			$("#chk_confirm_pwd").html("密码不一致！");
		}
		else if($("#confirm_pwd").val()==""){
			$("#chk_confirm_pwd").html("密码不能为空！");
		}
		else{
			$("#chk_confirm_pwd").html("√");
			$("#chk_pwd").html("√");
		}
	});
	//电话验证
	$("#usr_tel").focus(function(){
		$("#chk_tel").html("输入电话号码");
	});
	$("#usr_tel").blur(function(){
		var tel = $("#usr_tel").val()
		if(tel.length!=11){
			$("#chk_tel").html("电话号码有误！");
		}
		else{
			$("#chk_tel").html("√");	   
		}
	});
	//邮箱验证
	$("#usr_eamil").focus(function(){
		$("#chk_email").html("输入邮箱");
	});
	$("#usr_tel").blur(function(){
		var email = $("#usr_email").val()
		var flag = "@"
		
		if(email.includes(flag)){
			$("#chk_email").html("√");
		}
		else{
			$("#chk_email").html("邮箱有误！");
		}
	});
	
	//邀请码验证
	$("#usr_invite").focus(function(){
		$("#chk_invite").html("输入邀请码");
	});
	$("#usr_invite").blur(function(){
		$.get("chk_invite.php",{invite_code:$("#usr_invite").val()},function(data){
			if(data==1){
				$("#chk_invite").html("√");
			}
			else{
				$("#chk_invite").html("邀请码有误！");
			}
		})
	});
	
	
	
	
});













