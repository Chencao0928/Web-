<?					 /*连接数据库*/
$conn=mysql_connect("localhost","root","111");			//连接数据库服务器
mysql_query("set names 'gb2312'");				//设置字符集
mysql_select_db("guestbook",$conn); 				//选择数据库
$result=mysql_query("Select * from lyb",$conn); 		//创建结果集
?>
<!-----------------------在页面上显示数据库中的记录-------------------->
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th> <th width="100">内容</th> <th width="60">作者</th>
    <th>email</th> <th width="80">来自</th></tr>
   <? 	//循环输出记录到页面上
	while($row=mysql_fetch_assoc($result)){	?>
  <tr><td ><?= $row['title']?></td> <td><?= $row['content']?></td>
    <td><?= $row['author']?></td> <td><?= $row['email']?></td>
    <td><?= $row['ip']?></td></tr>
  <? } ?>
</table>
<p>共有<?= mysql_num_rows($result) ?>条记录</p>