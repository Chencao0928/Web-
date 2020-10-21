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
id=request.QueryString("id")
set rs=server.createobject("adodb.recordset")
sql="select * from admin where id="&id
rs.open sql,conn,1,1
if rs.eof then
response.write"<SCRIPT language=JavaScript>alert('服务器出错，请联系管理员！');"
response.write"javascript:history.go(-1)</SCRIPT>"
else
admin=rs("admin")
password=rs("password")
aleave=rs("aleave")
%>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta name="keywords" content="衡阳师范学院人文社会科学系">
<META http-equiv=Content-Type content=text/html; charset=gb2312>
<style type="text/css">
<!--
.样式1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
  <form method="POST" action="admin_adminSave.asp?id=<%=id%>">
          
    <tr bgcolor="#FF9900"> 
      <td width="100%" height="24" colspan=2 align=center><span class="样式1">修 改 管 理 员 资 料</span></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">用户名：</td>
      <td width="70%"> 
      <input type="text" name="admin" value="<%=admin%>" size="20" class="input"></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">密码：</td>
      <td width="70%"> 
      <input type="text" name="password" value="<%=decrypt(rs("password"))%>" size="20" class="input"></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">权限：</td>
      <td width="70%" height="22"> 
        <select name="aleave" style="font-size:9pt" class="input">
<option value=super<%if aleave="super" then%> selected<%end if%>>超级管理员</option>
<option value=check<%if aleave="check" then%> selected<%end if%>>普通管理员</option>
</select></td>
</tr>
    <tr align="center" bgcolor="#FFE6BF" height="24"> 
      <td height="30" colspan=2> 
        <input type="hidden" value="edit" name="act">
<input name="cmdok" type="submit" id="cmdok" value=" 修 改 " class="input">
        &nbsp;
<input name="cmdcance" type="reset" id="cmdcance" value=" 清 除 " class="input"></td>
</tr>
</form>
</table>
</body>
</html>
<%
end if
rs.close
set rs=nothing
%>