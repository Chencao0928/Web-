<!--#include file="adminconn.inc"-->
<%if session("admin")="" then
response.Write "<script language='javascript'>alert('���糬ʱ������û�е�½��');window.location.href='login.asp';</script>"
response.End
end if
%>
<%
set rs=server.createobject("adodb.recordset")
conn.execute "delete from guestbook where id="&trim(request.querystring("id"))
response.redirect "viewreturn.asp"
%>