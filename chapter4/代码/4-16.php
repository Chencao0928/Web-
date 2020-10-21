<?
if($_GET['action'] == "logout"){
session_start();		//启动会话
setcookie("user","",time()-60);	//将会话Cookie变量user设置为过期，即删除Cookie
session_unset();		//删除$_SESSION中的Session变量
session_destroy();		//销毁Session，删除Session ID
header("Location:4-14.php");		//回到登录界面
}	?>
