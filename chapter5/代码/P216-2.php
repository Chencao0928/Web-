<? 	require('conn_pdo.php');			// conn.php��5.7.2���嵥5-19
	$result=$db->query('select * from lyb'); 			//ִ�в�ѯ���������
	$result->setFetchMode(PDO::FETCH_ASSOC);
?>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th> <th width="100">����</th> <th width="60">����</th>
    <th>email</th> <th width="80">����</th> </tr>
  <? while($rows=$result->fetchAll()){			//��ȡһ����¼������$row�� 
			foreach( $rows as $row ) {

?>
  <tr><td ><?= $row['title'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } }?>
</table><p>���� <?= $result->rowCount()?>��</p>
