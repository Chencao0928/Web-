<? 	$dsn="mysql:host=localhost;dbname=guestbook";
	$db=new PDO($dsn,'root','111');			//连接数据库
	$db->query('set names gb2312'); 			//设置字符集
	$result=$db->query('select * from lyb'); 			//执行查询创建结果集
	$result->setFetchMode(PDO::FETCH_ASSOC);
	//print_r($row=$result->fetch());	
?>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th> <th width="100">内容</th> <th width="60">作者</th>
    <th>email</th> <th width="80">来自</th> </tr>
  <? while($row=$result->fetch()){			//读取一条记录到数组$row中 
?>
  <tr><td ><?= $row['ID'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } ?>
</table><p>共有 <?= $result->rowCount()?>行</p>
