<? 	require('conn_pdo.php');			// conn.php见5.7.2节清单5-19
	$sql="insert into lyb(title,content,author) values(?,?,?)";	//用?号作占位符
	$stmt=$db->prepare($sql);	//准备执行查询
	$title='PDO预处理';	$content='这是插入的记录';	$author='西贝乐';
	$stmt->bindParam(1,$title);	//绑定第1个参数
	$stmt->bindParam(2,$content);
	$stmt->bindParam(3,$author);
	$stmt->execute();			//执行插入语句，将插入一条记录
 echo '新插入记录的ID是：'.$db->lastInsertId();
			//如果要再插入记录，只要添加下面的代码即可
	$title='第二条';	$content='第二次插入的记录';	$author='书法家';
	$stmt->execute();			//再次执行重新绑定参数的准备语句，插入第二条记录
	 ?>
