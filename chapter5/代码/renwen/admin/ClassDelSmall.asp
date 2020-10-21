<%@language=vbscript codepage=936 %>
<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim SmallClassID,sql
SmallClassID=trim(Request("SmallClassID"))
SmallClassName=trim(Request("SmallClassName"))
if SmallClassID<>"" then
	sql="delete from SmallClass where SmallClassID="&Cint(SmallClassID)&""
	conn.Execute sql
	sql="delete from NEWS where SmallClassName='" & SmallClassName & "'"
	conn.Execute sql
end if
call CloseConn()      
response.redirect "ClassManage.asp"
%>