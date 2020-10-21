<!--#include file="adminconn.inc" -->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="keywords" content="">
<title>衡阳师范学院人文社会科学系=>后台管理</title>
</head>

<frameset rows="*" cols="180,*" framespacing="1" frameborder="yes" border="1" bordercolor="#47478D">
  <frame src="admin_left.asp" name="left" scrolling="NO" noresize>
  <frame src="admin_center.asp" name="main">
</frameset>
<noframes><body>

</body></noframes>
</html>