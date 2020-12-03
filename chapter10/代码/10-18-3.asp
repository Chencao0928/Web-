<!--Ajax方式同时删除多条记录，仅del2()函数不同-->
<!--#include file="conn.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax方式同时删除多条记录</title>
<style>
#editbox{
width:402px;
height:200px;
z-index:999;
background:white;
   position:absolute;
   top:20%;
   left:30%;
   border:1px #CCCCCC solid;
   display:none;}
</style>
 <script src="jquery.min.js"></script>
<script>
function modify1(id)
{   

       title=$("#title").val(); 
		author=$("#author").val(); 
		  email=$("#email").val(); 
		   content=$("#content").val(); 

   $.post("10-19-3.asp",{
		   title:escape(title),
		   id:id,
		   author:escape(author),
		   email:escape(email),
		   content:escape(content),
		   act:"modify"
	   },
	  function(data){ 	  
	      if(data==1)
		  {
		    kk="fff"+id;
			   	
			   s=document.getElementById(kk).firstChild; //该行中的第1个单元格
			   s.innerHTML=title;				   
			   s=s.nextSibling; 	//该行中的第2个单元格
			   s.innerHTML=content;			   
			   s=s.nextSibling;
			   s.innerHTML=author;			   
			   s=s.nextSibling;
			   s.innerHTML=email; 			
		  }  
		                		  
      }
   ); 
  close2()
}

function del2(){
var delsel=new Array();//定义数组delsel
    $(":checkbox:checked").each(function(){
	delsel[delsel.length]=this.value;//将选中记录的id值保存到数组中

	});
		idstr=delsel.join();//数组delsel转换成字符串
	 $.get("10-19-3.asp",{id:idstr,act:"del"},//选中的记录id组成的字符串给10-19.asp
	function(data)	{ 
		
	    if(data==1)  {
			  for (i in delsel){//对每个数组中保存的记录id值
		    kk="fff"+delsel[i];			   	
			   s=document.getElementById(kk); //被删除的记录对应的行
			   $(s).remove(); //删除行
			}   }  
	} );   	
		
	
}


function close2()
{
    $("#editbox").css("display","none");
}
function edit1(id)
{  
    $.post("10-19-3.asp",{id:id,act:"edit"},
	function(data)
	{ 	
	    str=data.split("|");
	
		str0=' <table width="400" border="0" cellpadding="4" cellspacing="1" bgcolor="#999">\
		<form name="form1"><tbody bgcolor="#ffffff"><tr bgcolor="#999999">\
		<td width="125">留言主题：</td> \
		<td width="475"><input type="text" id="title" value="'+str[1]+'"></td></tr>\
	<tr><td>留言人：</td> <td><input type="text" id="author" value="'+str[2]+'"></td> </tr>\
	<tr><td>联系方式：</td>\
	<td><input type="text" id="email" value="'+str[3]+'"></td></tr>\
	<tr><td>留言内容：</td><td>\
	<textarea id="content" cols="30" rows="3">'+str[4]+'</textarea></td></tr>\
	<tr><td></td><td>\
	<input type="button" id="Submit" value="修 改" onClick="javascript:modify1('+str[0]+');"> \
	<input name="reset" type="reset" id="reset" value="关闭" onClick="javascript:close2();"/>\
	</td></tr></tbody></form></table>';	
		
		//document.getElementById("editbox").innerHTML=str0;
		$("#editbox").html(str0);
		$("#editbox").fadeIn(300);		//以渐现方式显示弹出框
		//$("#editbox").css("display","block");	 	
	}
    ); 
 
} 
   
</script>  
</head>

<body>
<%
set rs=server.CreateObject("adodb.recordset")
rs.open "select * from lyb",conn,1,3

if not(rs.bof and rs.eof) then %>
<table align="center" border="1" width="100%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th>
    <th width="100">内容</th>
    <th width="60">作者</th>
    <th>email</th>
    <th width="80">来自</th>
	<th>编辑</th><th>删除</th>
  </tr>
  <% 
  do while not rs.eof 

  %>
  <tr id="fff<%=rs("id")%>">
    <td><%= rs("title") %></td>
    <td><%= rs("content") %></td>
    <td><%= rs("author") %></td>
    <td><%= rs("email") %></td>
    <td><%= rs("ip") %> </td>
		<td><a href="javascript:;"  onclick="edit1(<%=rs("id")%>)">编辑</a></td>
		<td><input type="checkbox" name="sel" value="<%=rs("id")%>"></td><!--语句①-->
	

  </tr>
  <% rs.movenext
loop
%>
<tr bgcolor="#E0E0E0">
	<td></td><td></td><td></td><td></td><td></td><td></td>
	<td align="center"><input type="button" value="删 除" onclick="del2()"></td>
	</tr>


</table>
<%
else
response.Write("<p>目前还没有用户留言</p>")

end if
rs.close
set rs=nothing
 %>
<div id="editbox"></div>
 
</body>
</html>
