<?	$conn=new mysqli();
	$conn->connect('localhost','root','111');
	$conn->select_db('guestbook'); 		//�������ݿ�
	$conn->query('set names gb2312'); 		//�����ַ���
	$result=$conn->query('select * from lyb'); 		//���������
?>	
<table border="1" width="95%"> 
	<tr bgcolor="#e0e0e0">
    <th>����</th> <th width="100">����</th> <th width="60">����</th>
    <th>email</th></tr>
  <? 	$result->data_seek(5); 		//�ӵ�6����¼��ʼ������ȥ��
while($row=$result->fetch_assoc()){			//ѭ����ȡ������еļ�¼
?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td> </tr>
  <? } ?>
</table>
<p>��¼���� <?= $result->num_rows ?></p>
