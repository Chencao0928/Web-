<!--#include file="adminconn.inc"-->
<% 
function changechr(str) 
    changechr=replace(replace(replace(replace(str,"<","&lt;"),">","&gt;"),chr(13),"<br>")," ","&nbsp;") 
    changechr=replace(replace(replace(replace(changechr,"[owen]","<img src="),"[b]","<b>"),"[red]","<font color=CC0000>"),"[big]","<font size=5>") 
    changechr=replace(replace(replace(replace(changechr,"[/owen]","></img>"),"[/b]","</b>"),"[/red]","</font>"),"[/big]","</font>") 
end function
%> 
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
id=request("id")
title=request("title")
BigClassName=request("BigClassName")
SmallClassName=request("SmallClassName")
msg=changechr(request("msg"))
user=request("user")
add=request("add")
tel=request("tel")
email=request("email")


set rs=server.createobject("adodb.recordset")
sql="select * from NEWS where id="&id
rs.open sql,conn,1,3
if not (rs.bof and rs.eof) then
rs("title")=title
rs("msg")=msg
rs("user")=user
rs("BigClassName")=BigClassName
rs("SmallClassName")=SmallClassName
rs("add")=add
rs("tel")=tel
rs("email")=email
rs.update
rs.close
set rs=nothing
response.write "<script language='javascript'>" & chr(13)
		response.write "alert('新闻修改成功！');" & Chr(13)
		response.write "window.document.location.href='admin_NEWS.asp';"&Chr(13)
		response.write "</script>" & Chr(13)
Response.End
else
response.Write("数据库出错")
end if
%>