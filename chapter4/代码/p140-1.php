<?	session_start();
unset($_SESSION["username"]);	//删除$_SESSION中一个session变量
session_unset();			//删除$_SESSION中所有session变量
?>
