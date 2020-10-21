<?	require('conn.php'); 		//连接数据库
$result=mysql_query("Select * from lyb",$conn); 		//创建结果集
?>
<a href="addform.php">添加记录</a>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th>
    <th>来自</th><th>删除</th><th>更新</th> </tr>
  <? while($row=mysql_fetch_assoc($result)){ 		//显示结果集中记录
?>
  <tr><td ><?= $row['ID'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip']?></td>
		<td><a href="delete.php?id=<?= $row['ID'] ?>">删除</a></td>
		<td><a href="editform.php?id=<?= $row['ID'] ?>">更新</a></td>
</tr>
  <? } ?>
</table>
