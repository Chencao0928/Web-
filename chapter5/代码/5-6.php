<?	require('conn.php'); 		//�������ݿ�
$result=mysql_query("Select * from lyb",$conn); 		//���������
?>
<a href="addform.php">��Ӽ�¼</a>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th><th>����</th><th>����</th><th>email</th>
    <th>����</th><th>ɾ��</th><th>����</th> </tr>
  <? while($row=mysql_fetch_assoc($result)){ 		//��ʾ������м�¼
?>
  <tr><td ><?= $row['ID'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip']?></td>
		<td><a href="delete.php?id=<?= $row['ID'] ?>">ɾ��</a></td>
		<td><a href="editform.php?id=<?= $row['ID'] ?>">����</a></td>
</tr>
  <? } ?>
</table>
