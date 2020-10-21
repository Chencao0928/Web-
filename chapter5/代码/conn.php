<?				
$conn=mysql_connect("localhost","root","111");		 //连接数据库服务器
mysql_query("set names 'gb2312'");	 		//设置字符集
mysql_select_db("guestbook",$conn); 			//选择数据库
?>
