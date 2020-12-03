<!--#include file="conn.asp"-->
<%	Response.Charset="utf-8"
username=request("username")
sql="select * from admin where user='"&username&"'"
rs.open sql,conn,1,1
If rs.eof Then
	response.write "<font color=#0000ff>可以注册</font>"
Else
	response.write "<font color=#ff0000>此用户名已经注册</font>"
End If
rs.close	%>
