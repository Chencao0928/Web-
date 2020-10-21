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
set rs=server.CreateObject("ADODB.RecordSet")
rs.open "delete * from admin where id="&request.QueryString("id"),conn,1
set rs=nothing
response.redirect "admin_admin.asp"
%>