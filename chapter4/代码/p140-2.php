<? session_start();
	echo '<p>这个用户的Session编号为'.session_id().'</p>';
	$_SESSION["user_name"]="布什";
	session_destroy();							//清除Session ID
	echo '<p>这个用户的Session编号为'.session_id().'</p>';
	echo $_SESSION["user_name"];			//会输出“布什”
?>
