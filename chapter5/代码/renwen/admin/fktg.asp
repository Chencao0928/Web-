<!--#include file="adminconn.inc"-->
<%if session("admin")="" then
response.Write "<script language='javascript'>alert('���糬ʱ������û�е�½��');window.location.href='login.asp';</script>"
response.End
end if
%>
<%
id=cint(request.querystring("id"))
set rs=server.createobject("adodb.recordset")
conn.execute "update guestbook set online=1 where id="&trim(id)
response.write "<script>alert('���������ͨ��������ҳ������ʾ');location.href='viewreturn.asp';</script>"
%>