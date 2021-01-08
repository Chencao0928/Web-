<?//设置session
session_start();
$_SESSION["login_flag"] = true;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录界面</title>
</head>

<body>
<form action="seek_career.php" method="post" name="usr_login">
<table width="300" border="1">
  <tbody>
	<caption>
    登录界面
  </caption>
    <tr>
      <td>用户名：&nbsp;</td>
      <td>&nbsp;<input type=text name="usr_name" value= <?="'".$_COOKIE['name']."'"?>></td>
    </tr>
    <tr>
      <td>密码：&nbsp;</td>
      <td>&nbsp;<input type=password name="usr_pwd" value=<?="'".$_COOKIE['pwd']."'"?>></td>
    </tr>
    <tr>
      <td colspan=2>记住密码&nbsp;<input type=checkbox name="rember_usr" checked="checked" value="true"></td>
    </tr>
  	<tr>
      <td colspan=2><a href="register.php">注册新用户</a>&nbsp;<input type=submit name="btn_submit" value="登录">&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>

</body>
</html>
