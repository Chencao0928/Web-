<!--#include file="adminconn.inc"-->
<%if session("admin")="" then
response.Write "<script language='javascript'>alert('���糬ʱ������û�е�½��');window.location.href='login.asp';</script>"
response.End

end if
%>
<%
set rs=server.createobject("adodb.recordset")
rs.open "select * from guestbook where id="&request("id"),conn,3,2
if request("action")<>"save" then
%>
<html>
<head>
<title>�ظ�</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../images/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<form action="reply.asp?action=save&id=<%=request("id")%>" method="post" name="form" id="form">
  <table width="88%" border="1" align="center" cellpadding="0" cellspacing="5" bordercolor="#0033FF" class=log_table>
    <tr> 
      <td align="center"> <table  width="100%" border="0" class=log_titlewidth="100%">
          <tr> 
            <td>&nbsp;&nbsp;&nbsp;�������ݣ�</td>
          </tr>
          <tr> 
            <td> 
              <%
Function unHtml(content)
	ON ERROR RESUME NEXT
	unHtml=content
	IF content <> "" Then
		unHtml=Server.HTMLEncode(unHtml)
		unHtml=Replace(unHtml,vbcrlf,"<br>")
		unHtml=Replace(unHtml,chr(9),"&nbsp;&nbsp;&nbsp;&nbsp;")
		unHtml=Replace(unHtml," ","&nbsp;")
	End IF
	IF Err.Number <>0 Then
		unHtml= "HTMLת���г�������ϵ����Ա<br>"
		Err.Clear
	End IF
End Function
%>
              &nbsp;&nbsp;&nbsp;<%=unHtml(rs("content"))%></td>
          </tr>
          <tr> 
            <td><strong>&nbsp;&nbsp;&nbsp;�� �� Ա �� �� </strong></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="65%">&nbsp;&nbsp;&nbsp;�ظ�<font color="#990033"><%=rs("name")%></font>������</td>
            <td rowspan="2"><div align="right"></div></td>
          </tr>
          <tr> 
            <td>&nbsp;&nbsp;&nbsp;������255���ַ���</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td valign="middle">&nbsp;&nbsp;&nbsp;�ظ����ݣ� <br> &nbsp;&nbsp;&nbsp; <textarea name="reply" cols="58" rows="8" class="wenbenkuang" id="reply"></textarea> 
      </td>
    </tr>
    <tr>
      <td valign="middle"><input type="radio" name="Online" value="0" <%if rs("Online")="0" then%>checked<%end if%>>
        ����
        <input type="radio" name="Online" value="1" <%if rs("Online")="1" then%>checked<%end if%>>
        ���� </td>
    </tr>
    <tr> 
      <td height="30"> &nbsp;&nbsp;&nbsp; <input type="submit" class="go-wenbenkuang" value="�ظ�" name="button"> 
        &nbsp;&nbsp;
        <input name="Submit2" type="reset" class="go-wenbenkuang" id="Submit2" value="����"> 
      </td>
    </tr>
  </table>
  </form>
<%
else
if request.form("reply")="" then
response.write"<SCRIPT language=JavaScript>alert('�Բ��𣬹������ݲ���Ϊ�գ�');"
response.write"javascript:history.go(-1)</SCRIPT>"
else
rs("reply")=Server.HTMLEncode(request.form("reply"))
rs("Online")=request("Online")
rs.update
rs.close
set rs=nothing
response.redirect "viewreturn.asp"
end if
end if
%>
</body>
</html>