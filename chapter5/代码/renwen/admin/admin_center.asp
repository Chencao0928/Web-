<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta name="keywords" content="����ʦ��ѧԺ������Ϣ������ҳ��������ҳ�����ţ����ŷ��������������ŷ�������ϵͳ">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������</title>
<style type="text/css">
<!--
.��ʽ1 {color: #FFFFFF}
.��ʽ6 {font-size: larger}
.��ʽ7 {
	color: #FF0000;
	font-weight: bold;
}
.��ʽ9 {
	color: #FF9900;
	font-weight: bold;
}
-->
</style>
</head>

<body >
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
  <tr> 
    <td height="300" align="center" valign="top" bgcolor="#FFDBA4"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%">&nbsp;</td>
          <td width="95%" height="40"><span class="��ʽ9">����Ա</span>��<font color="#FF0000"><strong><%=session("admin")%></strong></font> 
            <span class="��ʽ6">��ӭ�������ʦ��ѧԺ��������ѧ̨����ϵͳ������������Ȩ��</span></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table>
      <table width="95%" border="0" cellspacing="2" cellpadding="0">
        <tr> 
          <td height="30" align="center"><p class="��ʽ7"><font size="4">�����Ա���渺�����վ</font></p>          </td>
        </tr>
        <tr>
          <td height="25">������Ϥʹ�ñ��������ϴ��ͷ�����Ϣ!!!</td>
        </tr>
        <tr> 
          <td height="25" align="right">���������ҳ��http://liaoshuheng.126.com 2005.04.28</td>
        </tr>
      </table>    </td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FF9900"><span class="��ʽ1"> ����������<a href="mailto:liaoshuheng@163.com"><font color=FFFFFF>�������</font></a>      &copy; 2005</span></td>
  </tr>
</table>
</body>
</html>