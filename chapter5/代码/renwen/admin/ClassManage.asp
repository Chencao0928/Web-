<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim sql,rsBigClass,rsSmallClass,ErrMsg
set rsBigClass=server.CreateObject("adodb.recordset")
rsBigClass.open "Select * From BigClass",conn,1,3
%>
<script language="JavaScript" type="text/JavaScript">
function checkBig()
{
  if (document.form1.BigClassName.value=="")
  {
    alert("�������Ʋ���Ϊ�գ�");
    document.form1.BigClassName.focus();
    return false;
  }
}
function checkSmall()
{
  if (document.form2.BigClassName.value=="")
  {
    alert("������Ӵ������ƣ�");
	document.form1.BigClassName.focus();
	return false;
  }

  if (document.form2.SmallClassName.value=="")
  {
    alert("С�����Ʋ���Ϊ�գ�");
	document.form2.SmallClassName.focus();
	return false;
  }
}
function ConfirmDelBig()
{
   if(confirm("ȷ��Ҫɾ���˴�����ɾ���˴���ͬʱ��ɾ����������С��͸����µ��������ţ����Ҳ��ָܻ���"))
     return true;
   else
     return false;
	 
}

function ConfirmDelSmall()
{
   if(confirm("ȷ��Ҫɾ����С����ɾ����С��ͬʱ��ɾ�������µ��������ţ����Ҳ��ָܻ���"))
     return true;
   else
     return false;
	 
}
</script>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
.��ʽ1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="top"><br>
      <a href="ClassAddBig.asp"><strong><font color="#FF0000"><u>�����վһ������</u></font></strong></a><br>
      <br> 
      <table width="747" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
        <tr bgcolor="#FF9900"> 
          <td width="50%" height="30" align="center" bgcolor="#FF9900"><span class="��ʽ1">��Ŀ����</span></td>
          <td height="30" align="center"><span class="��ʽ1">����ѡ��</span></td>
        </tr>
        <%
	do while not rsBigClass.eof
%>
        <tr bgcolor="#FFCA79" class="tdbg"> 
          <td width="233" height="22"><img src="../images/%2B.gif" width="15" height="15"><%=rsBigClass("BigClassName")%></td>
          <td align="right" style="padding-right:10"><a href="ClassAddSmall.asp?BigClassName=<%=rsBigClass("BigClassName")%>"><font color="#FF0000">��Ӷ�������</font></a> 
            | <a href="ClassModifyBig.asp?BigClassID=<%=rsBigClass("BigClassID")%>">�޸�</a> 
            | <a href="ClassDelBig.asp?BigClassName=<%=rsBigClass("BigClassName")%>" onClick="return ConfirmDelBig();">ɾ��</a></td>
        </tr>
        <%
	  set rsSmallClass=server.CreateObject("adodb.recordset")
	  rsSmallClass.open "Select * From SmallClass Where BigClassName='" & rsBigClass("BigClassName") & "'",conn,1,1
	  if not(rsSmallClass.bof and rsSmallClass.eof) then
		do while not rsSmallClass.eof
	%>
        <tr bgcolor="#FFE6BF" class="tdbg"> 
          <td width="233" height="22">&nbsp;&nbsp;<img src="../images/-.gif" width="15" height="15"><%=rsSmallClass("SmallClassName")%></td>
          <td align="right" style="padding-right:10"><a href="ClassModifySmall.asp?SmallClassID=<%=rsSmallClass("SmallClassID")%>">�޸�</a> 
            | <a href="ClassDelSmall.asp?SmallClassID=<%=rsSmallClass("SmallClassID")%>&SmallClassName=<%=rsSmallClass("SmallClassName")%>" onClick="return ConfirmDelSmall();">ɾ��</a></td>
        </tr>
        <%
			rsSmallClass.movenext
		loop
	  end if
	  rsSmallClass.close
	  set rsSmallClass=nothing	
	  rsBigClass.movenext
	loop
%>
      </table>
      <br>
    </td>
  </tr>
</table>
<%
rsBigClass.close
set rsBigClass=nothing
%>