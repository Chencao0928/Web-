<? require('conn.php');
$Page=3; 					//��ʾ��3ҳ�ļ�¼
$PageSize=4;
$result=mysql_query("Select * from lyb",$conn); 		//������ȡ��¼�����Ľ����
$RecordCount=mysql_num_rows($result);
$PageCount =ceil($RecordCount/$PageSize);
$result=mysql_query("Select * from lyb limit ". ($Page-1)*$PageSize." , ".$PageSize, $conn);   	?>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
 <th>����</th><th>����</th><th>����</th><th>email</th><th>����</th></tr>
  <? while($row=mysql_fetch_assoc($result)){ 	?>
  <tr><td ><?= $row['ID'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? } 
  mysql_free_result($result);  ?></table>
