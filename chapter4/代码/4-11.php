<?   $IP=$_SERVER['REMOTE_ADDR']; 	//获取用户IP地址
		$From=$_SERVER['HTTP_REFERER']; 	//获取用户来路
		echo "您的IP地址是：" . $IP;
		echo '<br>您是单击'.$From.'页面中的链接进来的'
?>
