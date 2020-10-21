<? session_start();
if (isset($_POST["submit"]))	{		//判断是否单击了登录按钮
  	$user=$_POST["userName"];
		$pw=$_POST["PW"];
	if ($user=="admin" && $pw=='123'){		//判断用户名密码是否正确
		$_SESSION['user']=$user;		//将用户名存入$_SESSION['user']，这是关键
		header('Location:4-15.php');}
	else	echo "用户名或密码错误";		
 }
else  echo '
<form method="post" action="">
  用户名：<input type="text" name="userName" />
  密 码：<input type="password" name="PW" />
  <input name="submit" type="submit" value="登录" />
</form>'; 		?>
