<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
if request("action")="add" then
types=request.Form("types")
'�������������Ƿ�Ψһ
sql="select * from type where types='"&types&"' order by typeid desc"
set rs=server.createobject("ADODB.Recordset")
rs.open sql,conn,1,1
if not(rs.eof or rs.bof) then
response.write"<SCRIPT language=JavaScript>alert('�Բ��𣬴�������Ʋ�Ψһ,���ʵ��');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
end if
rs.close
set rs=nothing
'������
conn.execute "insert into type (types) values ('"&types&"')"
response.redirect "admin_type.asp" 
response.end
end if
if request("action")="del" then
set rs=server.CreateObject("ADODB.RecordSet")
rs.open "delete * from type where typeid="&request("id"),conn,1
response.redirect "admin_type.asp" 
response.end
end if

if request("action")="mod" then
types=request.Form("types")
typesm=request.Form("typesm")
'�����޸ĺ����������Ƿ�Ψһ
if types<>typesm then
sql="select * from type where types='"&typesm&"' order by typeid desc"
set rs=server.createobject("ADODB.Recordset")
rs.open sql,conn,1,1
if not(rs.eof or rs.bof) then
response.write"<SCRIPT language=JavaScript>alert('�Բ��𣬴��������Ψһ,���ʵ��');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
end if
rs.close
set rs=nothing
end if

conn.execute "update type set types='"&typesm&"' where types='"&types&"'"
response.redirect "admin_type.asp"
response.end
end if
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css.css" type="text/css">
<title>�����������</title>
<style type="text/css">
<!--
.��ʽ1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="50%" height="190" valign="top"> 
      <table width="90%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr align="center" bgcolor="#FF9900"> 
          <td width="19%" height="24"><span class="��ʽ1">ID</span></td>
          <td width="44%"><span class="��ʽ1">���</span></td>
          <td width="44%" colspan="2"><span class="��ʽ1">����</span></td>
        </tr>
        <%
		Set rs=Server.CreateObject("ADODB.RecordSet") 
sql="select * from type" 
rs.Open sql,conn,1,1
if rs.eof and rs.bof then
response.Write("û�м�¼")
else
do while not rs.eof
%>
        <tr align="center" bgcolor="#FFFFFF"> 
          <td height="24"><font color="#FF0000"><%=rs("typeid")%></font></td>
          <td><%=rs("types")%></td>
          <td><a href="admin_type.asp?types=<%=rs("types")%>&a=m">�޸�</a></td>
          <td><a href="admin_type.asp?action=del&id=<%=rs("typeid")%>" title="�����������ɾ���󲻿ɻָ�">ɾ��</a></td>
        </tr>
        <%
rs.movenext
loop
end if
rs.close
set rs=nothing
%>
      </table></td>
    <td width="50%" align="center" valign="top"> 
      <% If request("a")="m" Then %>
      <table width="90%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr align="center" bgcolor="#FF9900"> 
          <td height="24" colspan="2"><font color="#0000FF">�޸�</font><span class="��ʽ1">�������</span></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <form name="form1" method="post" action="admin_type.asp">
            <td width="50%" height="30" align="center"> 
              <input name="typesm" type="text" value="<%=request("types")%>" class="input"> 
            </td>
            <td width="50%" align="center"> 
              <input type="hidden" name="action" value="mod"> 
			 <input type="hidden" name="types" value=<%=request("types")%>>
              <input type="submit" name="Submit2" value="�޸�" class="input"></td>
          </form>
        </tr>
      </table> 
      <% Else %>
      <table width="90%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr align="center" bgcolor="#FF9900"> 
          <td height="24" colspan="2"><font color="#FF0000">���</font><span class="��ʽ1">�������</span></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <form name="form1" method="post" action="admin_type.asp">
            <td width="50%" height="30" align="center"> 
              <input type="text" name="types" class="input">
            </td>
            <td width="50%" align="center"> 
              <input type="hidden" name="action" value="add">
              <input type="submit" name="Submit" value="���" class="input"></td>
          </form>
        </tr>
      </table>
	  <% End If %>
    </td>
  </tr>
</table>
</body>
</html>