<!--#include file="adminconn.inc" -->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%if session("aleave")="check" then
response.write"<SCRIPT language=JavaScript>alert('对不起，你没有这个权限！');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
end if%>
<%
admin=request.form("admin")
password=request.form("password")
aleave=request.form("aleave")
if admin="" or password="" then
response.write"<SCRIPT language=JavaScript>alert('管理员名称和密码都不能为空！');"
response.write"javascript:history.go(-1)</SCRIPT>"
Response.End
end if

set rs=server.CreateObject("ADODB.RecordSet")

if request("act")="edit" and request.QueryString("id")<>"" then
id=request("id")
sql="select * from admin where id="& request.QueryString("id")
rs.open sql,conn,3,2
if not rs.eof then
rs("aleave")=aleave
rs("admin")=admin
rs("password")=encrypt(password)
rs.update
end if
rs.close
elseif request("act")="add" then
sql="select * from admin where admin='"&admin&"'"
rs.open sql,conn,3,2
if (rs.eof and rs.bof) then
rs.addnew
rs("aleave")=aleave
rs("admin")=admin
rs("password")=encrypt(password)
rs.update
end if
rs.close
end if
set rs=nothing
conn.close
set conn=nothing
response.redirect "admin_admin.asp"
%>