<?  //ע�⣺���иó�����Ҫ���ļ�����Ӳ���,���磺5-18.php?id=6

 	$conn=new mysqli();
	$conn->connect('localhost','root','111');
	$conn->select_db('lyb');
	$conn->query('set names gb2312');
	$id=intval($_GET['id']);		//����ȡ��idǿ��ת��Ϊ����
	//ִ��2��SQL��䣬2��SQL���֮���á�;���Ÿ���
$conn->multi_query("Select * from lyb where ID=$id; Select distinct class from lyb");
$result=$conn->store_result();		//��ȡ��1�������
$row=$result->fetch_assoc();			 ?>
 <h2 align="center">��������</h2>
<form method="post" action="edit.php?id=<?= $row['ID'] ?>">
  <table width="400" border="1" align="center" cellpadding="2">
<tr> <td width="125">���Ա��⣺</td><td width="275">
<input type="text" name="title" value="<?= $row['title'] ?>"> *</td></tr>
	<tr> <td width="125">�������ͣ�</td><td>
<select name="clas">
<? 	$conn->next_result();		//ת����һ�������
	$rs=$conn->store_result();			//��ȡ��2�������
while($row2=$rs->fetch_assoc()){ 		//��class�ֶ���䵽��������	?>
	<option  value="<?= $row2["class"] ?>" <? if($row2["class"]==$row['class']) echo "selected"; ?>><?= $row2["class"] ?></option>
		<? } ?>
</select>  *</td></tr>
    <tr><td>�����ˣ�</td>
      <td><input type="text" name="author" value="<?= $row['author'];?>"> *</td></tr>
    <tr><td>��ϵ��ʽ��</td>
      <td><input type="text" name="email" value="<?= $row['email'];?>"> *</td></tr>
<tr><td>�������ݣ�</td><td><textarea name="content" cols="30" rows="2">
<?= $row['content'];?></textarea></td></tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="ȷ ��"></td></tr>
</table></form>
