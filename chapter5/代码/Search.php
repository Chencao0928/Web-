<?					 /*�������ݿ�*/
$conn=mysql_connect("localhost","root","111");			//�������ݿ������
mysql_query("set names 'gb2312'");				//�����ַ���
mysql_select_db("guestbook",$conn); 				//ѡ�����ݿ�
$result=mysql_query("Select * from lyb",$conn); 		//���������
?>
<form method="get" action="5-8.php">
 <div style="border:1px solid gray; background:#eee;padding:4px;"> 
�������ԣ�������ؼ��� <input name="keyword" type="text">
  <select name="sel">
    <option value="title">���±���</option>
    <option value="content">��������</option>
  </select>
  <input type="submit" value="��ѯ">
</div></form>


<!-----------------------��ҳ������ʾ���ݿ��еļ�¼-------------------->
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th> <th width="100">����</th> <th width="60">����</th>
    <th>email</th> <th width="80">����</th></tr>
   <? 	//ѭ�������¼��ҳ����
	while($row=mysql_fetch_assoc($result)){	?>
  <tr><td ><?= $row['title']?></td> <td><?= $row['content']?></td>
    <td><?= $row['author']?></td> <td><?= $row['email']?></td>
    <td><?= $row['ip']?></td></tr>
  <? } ?>
</table>
<p>����<?= mysql_num_rows($result) ?>����¼</p>