<? session_start();
 if (isset($_SESSION['user']))		//如果$_SESSION['user']不为空
		echo "欢迎您，".$_SESSION["user"]."<br/>
			<a href='4-16.php?action=logout'>注销</a> ";
else
		echo "未登录用户不允许访问";		?>
