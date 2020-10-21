<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta name="keywords" content="衡阳师范学院考研信息中心主页，个人主页，新闻，新闻发布，衡阳，新闻发布管理系统">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>！！！</title>
<style type="text/css">
<!--
.样式1 {color: #FFFFFF}
.样式6 {font-size: larger}
.样式7 {
	color: #FF0000;
	font-weight: bold;
}
.样式9 {
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
          <td width="95%" height="40"><span class="样式9">管理员</span>：<font color="#FF0000"><strong><%=session("admin")%></strong></font> 
            <span class="样式6">欢迎进入衡阳师范学院人文社会科学台管理系统！请慎用您的权限</span></td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table>
      <table width="95%" border="0" cellspacing="2" cellpadding="0">
        <tr> 
          <td height="30" align="center"><p class="样式7"><font size="4">请管理员认真负责管理本站</font></p>          </td>
        </tr>
        <tr>
          <td height="25">请在熟悉使用本程序下上传和发布信息!!!</td>
        </tr>
        <tr> 
          <td height="25" align="right">长风大侠主页：http://liaoshuheng.126.com 2005.04.28</td>
        </tr>
      </table>    </td>
  </tr>
  <tr> 
    <td height="30" align="center" bgcolor="#FF9900"><span class="样式1"> 程序制作：<a href="mailto:liaoshuheng@163.com"><font color=FFFFFF>长风大侠</font></a>      &copy; 2005</span></td>
  </tr>
</table>
</body>
</html>