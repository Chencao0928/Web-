<%
if request("logout")<>"" then 
session("admin")=""
session("password")=""
session("aleave")=""
response.redirect "adminlogin.asp"
end if
%>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<title>����ʦ��ѧԺ��������ѧϵ����ϵͳ</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="keywords" content="">
<style type="text/css">
<!--
body {
	background-image: url(../images/bg.gif);
}
.��ʽ2 {color: #FF9900}
-->
</style></head>

<body text="#FFFFFF">
<p align="center"><br>
  <br>
<p align="center"><br>
  <br>
<h1 align="center" class="��ʽ2">���Թ����¼</h1>
<h1 align="center">&nbsp;</h1>
<table width="245" height="97" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="245" height="97" valign="top" bgcolor="#FF9900"><table width="242" border="0" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
      <form method=post action="chkloginly.asp">
        <tr>
          <td width="100%" height="30" align="center" valign="middle" bgcolor="#FFE9BB"><span class="��ʽ2">�û�����
            </span>
            <input class="input" style="color: #FF0000; background-color: #FFFFFF; border: 1px solid #FF9900" size="12" name="admin"></td>
        </tr>
        <tr>
          <td width="100%" height="29" align="center" valign="middle" bgcolor="#FFE9BB"><span class="��ʽ2">�ܡ��룺</span>            <input class="input" style="color: #FF0000; background-color: #FFFFFF; border: 1px solid #FF9900" type="password" size="12" name="password"></td>
        </tr>
        <tr>
          <td width="100%" height="30" align="center" valign="middle" bgcolor="#FFE9BB">
            <input class="input" style="color: #FFFFFF; background-color: #FF9900; border: 1px solid #FF6600" type="submit" value="ȷ ��" name="Submit">
&nbsp;&nbsp;&nbsp;
        <input  class="input" style="color: #FFFFFF; background-color: #FF9900; border: 1px solid #FF6600" type="reset" value="ȡ ��" name="Submit2">          </td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<hr color=FF9900 width="555" size="1">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><span class="��ʽ2">&copy;2010-2011&nbsp;&nbsp;</span><font color=FF9900>Six</font><span class="��ʽ2"><a href="http://liaoshuheng.126.com"><font color=FF9900>������</font></a>&nbsp; ����������<a href="mailto:liaoshuehng@163.com" target="_blank"><font color="FF9900">Six tang</font></a></span></td>
  </tr>
</table>
</body>
</html>