<%@language=vbscript codepage=936 %>
<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim BigClassName,sql
BigClassName=trim(Request("BigClassName"))
if BigClassName<>"" then
	sql="delete from BigClass where BigClassName='" & BigClassName & "'"
	conn.Execute sql
	sql="delete from SmallClass where BigClassName='" & BigClassName & "'"
	conn.Execute sql
	sql="delete from NEWS where BigClassName='" & BigClassName & "'"
	conn.Execute sql
end if
call CloseConn()      
response.redirect "ClassManage.asp"
%>