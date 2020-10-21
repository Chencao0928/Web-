<?	$conn=new mysqli();
	$conn->connect('localhost','root','111');
	$conn->select_db('guestbook'); 		//连接数据库
	$conn->query('set names gb2312'); 		//设置字符集
	$result=$conn->query('select * from lyb'); 		//创建结果集
?>	
<table border="1" width="95%"> 
	<tr bgcolor="#e0e0e0">
    <th>标题</th> <th width="100">内容</th> <th width="60">作者</th>
    <th>email</th></tr>
  <? 	$result->data_seek(5); 		//从第6条记录开始读，可去掉
while($row=$result->fetch_assoc()){			//循环读取结果集中的记录
?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td> </tr>
  <? } ?>
</table>
<p>记录总数 <?= $result->num_rows ?></p>
