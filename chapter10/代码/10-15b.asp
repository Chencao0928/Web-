<!--#include file="conn.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax添加记录——弹出框形式</title>
<style>
#editbox{
	width:402px;
	/*height:200px;*/
z-index:999;
	background:silver;
	position:absolute;
	top:180px;
	left:200px;
	border:1px #CCCCCC solid;
	display:none;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=#666666,Direction=135,Strength=5)\9;
   }
</style>
<script src="jquery.min.js"></script>
<script>
$(document).ready(function(){   
    $("#Submit").click(function(){   //单击添加按钮时
        title=$("#title").val(); //获取表单中的数据
		author=$("#author").val(); 
		  email=$("#email").val(); 
		   content=$("#content").val(); 
		            
		 $.post("10-16b.asp",{	//发送表单中的数据给addnew.asp
		   title:escape(title),	
		  author:escape(author),
		   email:escape(email),
		   content:escape(content),
		   act:"add"
	   },
	 function(data){  	 //对10-15.asp的回调函数进行修改
 if(data==1)	{		 //收到标志1，表明服务器端已插入成功
	$("#title").val('');	$("#author").val(''); 	//清空添加记录框中的内容
	$("#email").val('');   $("#content").val(''); 
	var newtr="<tr><td width='100'>"+title+"</td><td>"+content+"</td><td>"+author+"</td> <td>"+email+"</td></tr>";		//把用户输入的数据放在一行内
	$("#make").prepend(newtr);		//在表格的所有行之前插入一行，即插入新的记录
	    $("#editbox").css("display","none");
		}  } ); 
    } );  
	    } );
		function add(id)				//获取要修改的记录并回显在编辑框中
{  
  
		$("#editbox").fadeIn(300);			//以渐现方式显示弹出框
 
} 
		
		
</script>  
</head>

<body>
<a href="javascript:;"  onclick="add()">添加记录</a>
<%			'上半部分显示留言的代码
rs.open "select top 4 * from lyb order by id desc",conn,1,1

if not(rs.bof and rs.eof) then %>
<table align="center" border="1">
  <tr bgcolor="#e0e0e0">
    <th>标题</th>
    <th width="100">内容</th>
    <th width="60">作者</th>
    <th>email</th>
    <th width="80">来自</th>
  </tr><tbody id="make">
  <% 
  do while not rs.eof 	'循环输出位于行中的记录

  %>
  <tr>
    <td width="100"><%= rs("title") %></td>
    <td><%= rs("content") %></td>
    <td><%= rs("author") %></td>
    <td width="80"><%= rs("email") %></td>
    <td><%= rs("ip") %> </td>
  </tr>
  <% rs.movenext
loop %>
</tbody>
</table>
<%
else
response.Write("<p>目前还没有用户留言</p>")

end if
rs.close
set rs=nothing
 %><div id="editbox">
<form style="margin:8px;">		<!--添加留言的表单区域-->
  <table width="450" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#333333">
  <caption>请在下面发表留言</caption>
  <tbody bgcolor="#ffffff">
    <tr>
      <td width="125">留言主题：</td>
      <td width="325"><input type="text" id="title"></td>
    </tr>
    <tr>
      <td>留言人：</td>
      <td><input type="text" id="author"></td>
    </tr>
    <tr>
      <td>联系方式：</td>
      <td><input type="text" id="email"></td>
    </tr>
    <tr>
      <td>留言内容：</td>
      <td><textarea id="content" cols="30" rows="2"></textarea></td>
    </tr>
	 <tr>
      <td></td>
      <td><input type="button" id="Submit" value="添 加"></td>
    </tr>
	</tbody>
  </table>
</form></div>
</body>
</html>
