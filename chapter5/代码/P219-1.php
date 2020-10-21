<? 	require('conn_pdo.php');			// conn.php见5.7.2节清单5-19
		$sql="select * from lyb where title like ?";		//用?号作占位符
	$stmt=$db->prepare($sql);			//准备执行查询
	$title='进口';
	$stmt->execute(array("%$title%"));		//执行查询的同时绑定参数
$row=$stmt->fetch(1); 			//以关联数组的形式将结果集中第1条记录取出
var_dump($row); 				//输出数组
echo $row['title'];		?>

