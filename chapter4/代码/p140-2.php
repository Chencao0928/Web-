<? session_start();
	echo '<p>����û���Session���Ϊ'.session_id().'</p>';
	$_SESSION["user_name"]="��ʲ";
	session_destroy();							//���Session ID
	echo '<p>����û���Session���Ϊ'.session_id().'</p>';
	echo $_SESSION["user_name"];			//���������ʲ��
?>
