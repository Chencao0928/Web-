<!--#include file="adminconn.inc" -->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%if session("aleave")="check" then
response.write"<SCRIPT language=JavaScript>alert('�Բ�����û�����Ȩ�ޣ�');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
end if%>
<%
id=request.QueryString("id")
set rs=server.createobject("adodb.recordset")
sql="select * from admin where id="&id
rs.open sql,conn,1,1
if rs.eof then
response.write"<SCRIPT language=JavaScript>alert('��������������ϵ����Ա��');"
response.write"javascript:history.go(-1)</SCRIPT>"
else
admin=rs("admin")
password=rs("password")
aleave=rs("aleave")
%>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta name="keywords" content="����ʦ��ѧԺ��������ѧϵ">
<META http-equiv=Content-Type content=text/html; charset=gb2312>
<style type="text/css">
<!--
.��ʽ1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
  <form method="POST" action="admin_adminSave.asp?id=<%=id%>">
          
    <tr bgcolor="#FF9900"> 
      <td width="100%" height="24" colspan=2 align=center><span class="��ʽ1">�� �� �� �� Ա �� ��</span></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">�û�����</td>
      <td width="70%"> 
      <input type="text" name="admin" value="<%=admin%>" size="20" class="input"></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">���룺</td>
      <td width="70%"> 
      <input type="text" name="password" value="<%=decrypt(rs("password"))%>" size="20" class="input"></td>
</tr>
    <tr bgcolor="#FFE6BF"> 
      <td width="30%" height="22" align="right">Ȩ�ޣ�</td>
      <td width="70%" height="22"> 
        <select name="aleave" style="font-size:9pt" class="input">
<option value=super<%if aleave="super" then%> selected<%end if%>>��������Ա</option>
<option value=check<%if aleave="check" then%> selected<%end if%>>��ͨ����Ա</option>
</select></td>
</tr>
    <tr align="center" bgcolor="#FFE6BF" height="24"> 
      <td height="30" colspan=2> 
        <input type="hidden" value="edit" name="act">
<input name="cmdok" type="submit" id="cmdok" value=" �� �� " class="input">
        &nbsp;
<input name="cmdcance" type="reset" id="cmdcance" value=" �� �� " class="input"></td>
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