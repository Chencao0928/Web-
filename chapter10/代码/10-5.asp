<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.min.js"></script>
<title>Ajax方式查找数据</title>
</head>

<body>

<script>
$(function(){ 		//页面载入时执行
$("#key").change(function(){	//当下拉框中值发生变化时执行
		var cc1 = $('#key').val(); //得到下拉菜单的选中项的value值
	if (cc1!=0) //如果下拉框中内容不为空
		{	//发送记录id和sid 两个参数到getweb.asp，math.random()避免缓存
		$.get("10-6.asp",{id:cc1,sid:Math.random()},
			function(data){
				$("#disp").html(data);
		});
		}
		else
		{	$("#disp").html("还没选择！");	}
});
})
</script>
<!--#include file="conn.asp"-->
<% 
Set rs=conn.Execute("Select * From link Order By link_id Desc")		%>
请选择网站:
<select id="key">
<option value="0">==请选择==</option>
<% Do While Not rs.Eof  %>		<!--填充下拉框中的数据-->
<option value="<%=rs("link_id")%>"><%=rs("name")%></option>
<% 		rs.MoveNext                          
		Loop
		rs.close		%>
</select>

<ul id="disp"><b>网站信息...</b></ul>

</body>
</html>
