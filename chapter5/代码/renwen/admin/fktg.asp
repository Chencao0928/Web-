<!--#include file="adminconn.inc"-->
<%if session("admin")="" then
response.Write "<script language='javascript'>alert('网络超时或您还没有登陆！');window.location.href='login.asp';</script>"
response.End
end if
%>
<%
id=cint(request.querystring("id"))
set rs=server.createobject("adodb.recordset")
conn.execute "update guestbook set online=1 where id="&trim(id)
response.write "<script>alert('留言已审核通过，将在页面上显示');location.href='viewreturn.asp';</script>"
%>