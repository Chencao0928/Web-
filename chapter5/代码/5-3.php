<?	require('conn.php');		
mysql_query( "insert into lyb ( title, content, author, email,`date`) values ('大家好', 'PHP学习园地', '小浣熊', 'sdf@sd.com','2012-3-3')") or die('执行失败');
echo '新增记录的id是'.mysql_insert_id();		//可选，输出新记录的id
?>
