<!--#include file="adminconn.inc" -->
<%
dim rs
admin1=request("admin")
password1=request("password")
set rs=server.CreateObject("ADODB.RecordSet")
rs.open "select * from admin where admin='" & admin1 & "' and password='"&encrypt(password1)&"'",conn,1
if rs.eof and rs.bof then
response.write"<SCRIPT language=JavaScript>alert('用户名或密码不正确！');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
else
session("admin")=rs("admin")
session("password")=rs("password")
session("aleave")=rs("aleave")
response.redirect "admin.asp"
end if
rs.close
set rs=nothing
%>