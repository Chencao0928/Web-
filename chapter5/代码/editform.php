<? 	require('conn.php'); 
$id=intval($_GET['id']);		//����ȡ��idǿ��ת��Ϊ����
$sql="Select * from lyb where ID=$id";		//��ȡ�����µļ�¼
$result=mysql_query($sql,$conn);	
$row=mysql_fetch_assoc($result); 		//�������¼�¼���ֶε�ֵ����������
 ?>
 <h2 align="center">��������</h2>
<form method="post" action="edit.php?id=<?= $row['ID'] ?>">
  <table width="400" border="1" align="center" cellpadding="2">
    <tr> <td width="125">���Ա��⣺</td> 
      <td width="275"><input type="text" name="title" value="<?= $row['title'] ?>"> *</td>
    </tr>
    <tr><td>�����ˣ�</td>
      <td><input type="text" name="author" value="<?= $row['author'] ?>"> *</td></tr>
    <tr><td>��ϵ��ʽ��</td>
      <td><input type="text" name="email" value="<?= $row['email'] ?>"> *</td></tr>
    <tr><td>�������ݣ�</td>
      <td><textarea name="content" cols="30" rows="2"><?= $row['content'] ?></textarea>
</td></tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="ȷ ��"></td></tr>
  </table></form>
