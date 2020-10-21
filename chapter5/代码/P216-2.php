<? 	require('conn_pdo.php');			// conn.php见5.7.2节清单5-19
	$result=$db->query('select * from lyb'); 			//执行查询创建结果集
	$result->setFetchMode(PDO::FETCH_ASSOC);
?>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th> <th width="100">内容</th> <th width="60">作者</th>
    <th>email</th> <th width="80">来自</th> </tr>
  <? while($rows=$result->fetchAll()){			//读取一条记录到数组$row中 
			foreach( $rows as $row ) {

?>
  <tr><td ><?= $row['title'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } }?>
</table><p>共有 <?= $result->rowCount()?>行</p>
