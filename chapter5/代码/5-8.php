<h3 align="center">��ѯ���</h3>
<? 	require('conn.php'); 
$keyword=trim($_GET['keyword']);		//��ȡ����Ĺؼ���
$sel=$_GET['sel'];						//��ȡѡ��Ĳ�ѯ��ʽ
$sql="select * from lyb";
if ($keyword <> "")
		$sql=$sql ." where $sel like '%$keyword%'";	//�����ѯ���
$rs=mysql_query( $sql) or die('ִ��ʧ��');
if (mysql_num_rows($rs)>0) {
		echo "<p>�ؼ���Ϊ�� $keyword �������ҵ�".mysql_num_rows($rs)." ������</p>"; ?>
<table border="1" align="center">
  <tr bgcolor="#e0e0e0">
    <th>����</th> <th width="100">����</th> <th width="60">����</th>
    <th>email</th> <th width="80">����</th></tr>
  <? while($row=mysql_fetch_assoc($rs)){ 
?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? }}
else	echo "û���������κ�����";	?>
</table>
