<? require('conn.php');
$Page=3; 					//显示第3页的记录
$PageSize=4;
$result=mysql_query("Select * from lyb",$conn); 		//创建获取记录总数的结果集
$RecordCount=mysql_num_rows($result);
$PageCount =ceil($RecordCount/$PageSize);
$result=mysql_query("Select * from lyb limit ". ($Page-1)*$PageSize." , ".$PageSize, $conn);   	?>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
 <th>标题</th><th>内容</th><th>作者</th><th>email</th><th>来自</th></tr>
  <? while($row=mysql_fetch_assoc($result)){ 	?>
  <tr><td ><?= $row['ID'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? } 
  mysql_free_result($result);  ?></table>
