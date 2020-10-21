<? 	$dsn="mysql:host=localhost;dbname=guestbook";
	$db=new PDO($dsn,'root','111');			//连接数据库
	$db->query('set names gb2312'); 			//设置字符集
?>
