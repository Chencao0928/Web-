<? 	require('conn.php'); 
if ($_GET["del"]==1){ 		//����û����ˡ�ɾ������ť
		$selectid=$_POST["selected"];		//��ȡ����ѡ�ж�ѡ���ֵ�����浽������
	if( count($selectid)>0){			//��ֹselectidֵΪ��ʱִ��SQL������
		$sel=implode(',',$selectid); 		//����������Ԫ���á�,������������
		mysql_query( "delete From lyb where ID in ($sel)") or die('ִ��ʧ��');
		header("Location:delall.php");		//ɾ����ϣ�ˢ��ҳ��
		}
	else echo 'û�б�ѡ�еļ�¼';
}
$result=mysql_query("Select * from lyb",$conn); 		//���������
	?>
<form method="post" action="?del=1"> <!--���ύ������-->
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th><th>����</th><th>����</th><th>email</th>
    <th>����</th><th>ɾ��</th><th>����</th> </tr>
 <? while($row=mysql_fetch_assoc($result)){ 
?>
  <tr> <td><?= $row['title']?></td> <td><?= $row['content']?></td>
    <td><?= $row['author']?></td> <td><?= $row['email']?></td>
    <td><?= $row['ip']?></td>
	<td align="center">
<input type="checkbox" name="selected[]" value="<?= $row['ID']?>"></td> <!--��ѡ��-->
	<td><a href="editform.php?id=<?= $row['ID']?>">����</a></td></tr>
  <? } ?>
<tr bgcolor="#E0E0E0">
	<td></td><td></td><td></td><td></td><td></td>
	<td align="center"><input type="submit" value="ɾ ��"></td> <!--ɾ����ť-->
	<td></td></tr>
</table></form>
