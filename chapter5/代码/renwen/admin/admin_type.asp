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
'检验此类别名称是否唯一
sql="select * from type where types='"&types&"' order by typeid desc"
set rs=server.createobject("ADODB.Recordset")
rs.open sql,conn,1,1
if not(rs.eof or rs.bof) then
response.write"<SCRIPT language=JavaScript>alert('对不起，此类别名称不唯一,请核实！');"
response.write"javascript:history.go(-1)</SCRIPT>"
response.end
end if
rs.close
set rs=nothing
'添加类别
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
'检验修改后的新闻类别是否唯一
if types<>typesm then
sql="select * from type where types='"&typesm&"' order by typeid desc"
set rs=server.createobject("ADODB.Recordset")
rs.open sql,conn,1,1
if not(rs.eof or rs.bof) then
response.write"<SCRIPT language=JavaScript>alert('对不起，此新闻类别不唯一,请核实！');"
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
<title>管理新闻类别</title>
<style type="text/css">
<!--
.样式1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="50%" height="190" valign="top"> 
      <table width="90%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr align="center" bgcolor="#FF9900"> 
          <td width="19%" height="24"><span class="样式1">ID</span></td>
          <td width="44%"><span class="样式1">类别</span></td>
          <td width="44%" colspan="2"><span class="样式1">操作</span></td>
        </tr>
        <%
		Set rs=Server.CreateObject("ADODB.RecordSet") 
sql="select * from type" 
rs.Open sql,conn,1,1
if rs.eof and rs.bof then
response.Write("没有记录")
else
do while not rs.eof
%>
        <tr align="center" bgcolor="#FFFFFF"> 
          <td height="24"><font color="#FF0000"><%=rs("typeid")%></font></td>
          <td><%=rs("types")%></td>
          <td><a href="admin_type.asp?types=<%=rs("types")%>&a=m">修改</a></td>
          <td><a href="admin_type.asp?action=del&id=<%=rs("typeid")%>" title="请谨慎操作，删除后不可恢复">删除</a></td>
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
          <td height="24" colspan="2"><font color="#0000FF">修改</font><span class="样式1">新闻类别</span></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <form name="form1" method="post" action="admin_type.asp">
            <td width="50%" height="30" align="center"> 
              <input name="typesm" type="text" value="<%=request("types")%>" class="input"> 
            </td>
            <td width="50%" align="center"> 
              <input type="hidden" name="action" value="mod"> 
			 <input type="hidden" name="types" value=<%=request("types")%>>
              <input type="submit" name="Submit2" value="修改" class="input"></td>
          </form>
        </tr>
      </table> 
      <% Else %>
      <table width="90%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr align="center" bgcolor="#FF9900"> 
          <td height="24" colspan="2"><font color="#FF0000">添加</font><span class="样式1">新闻类别</span></td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <form name="form1" method="post" action="admin_type.asp">
            <td width="50%" height="30" align="center"> 
              <input type="text" name="types" class="input">
            </td>
            <td width="50%" align="center"> 
              <input type="hidden" name="action" value="add">
              <input type="submit" name="Submit" value="添加" class="input"></td>
          </form>
        </tr>
      </table>
	  <% End If %>
    </td>
  </tr>
</table>
</body>
</html>