<!--#include file="conn.asp"-->
<%
response.Charset="utf-8"
username=request("userName")
userPwd = Request("userPwd")   
set rs=server.createobject("adodb.recordset")
sql="select * from admin where user='"&username&"' and password='"&userPwd&"'"
rs.open sql,conn,1,1
If rs.eof Then		'如果记录集为空
 response.write "用户名或密码错误，登录失败"
Else
 response.write "登录成功，欢迎："&username
End If
rs.close
Set rs=nothing
Set conn=Nothing
%>
