<? 	$dsn="mysql:host=localhost;dbname=guestbook";
	$db=new PDO($dsn,'root','111');			//�������ݿ�
	$db->query('set names gb2312'); 			//�����ַ���
	$result=$db->query('select * from lyb'); 			//ִ�в�ѯ���������
	$result->setFetchMode(PDO::FETCH_ASSOC);
	//print_r($row=$result->fetch());	
?>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th> <th width="100">����</th> <th width="60">����</th>
    <th>email</th> <th width="80">����</th> </tr>
  <? while($row=$result->fetch()){			//��ȡһ����¼������$row�� 
?>
  <tr><td ><?= $row['ID'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } ?>
</table><p>���� <?= $result->rowCount()?>��</p>
