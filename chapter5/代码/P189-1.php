<?	require('conn.php');
if(isset($_GET['page']) && (int)$_GET['page']>0)			 //��ȡҳ��
		$Page=$_GET['page'];
else	$Page=1;
$PageSize=4; 				//����ÿҳ��ʾ��¼��
$keyword=trim($_GET['keyword']); 		//��ȡ��ѯ�ؼ���
$sql="select * from lyb";
if ($keyword <> "")
		$sql=$sql ." where title like '%$keyword%'";
$result=mysql_query($sql,$conn); 		//�������޲�ѯ�ؼ��ִ��������
$RecordCount=mysql_num_rows($result); 	//��ü�¼����
$PageCount =ceil($RecordCount/$PageSize); 	//�����ҳ��
?>
<form method="get" action="">
 <div style="border:1px solid gray; background:#eee;padding:4px;"> 
�������ԣ�������ؼ���<input name="keyword" type="text" value="<?= $keyword?>">
  <input type="submit" value="��ѯ">
</div></form>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
    <th>����</th><th>����</th><th>����</th><th>email</th><th>����</th> </tr>
<? 
mysql_data_seek($result,($Page-1)*$PageSize); 		//��ָ��ָ���$Pageҳ��1����¼
for($i=0;$i<$PageSize;$i++){
		$row=mysql_fetch_assoc($result); 
 	if($row){		 ?>
  		<tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
   		<td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    		<td><?= $row['ip'] ?></td></tr>
  <? }} ?>
</table>
<p><?	// ��ʾ��ҳ����
	if($Page== 1)   echo  "��һҳ ��һҳ ";
else  echo  " <a href='?page=1&keyword=$keyword'>��һҳ</a> 
 <a href='?page=" . ($Page-1) . "&keyword=$keyword'>��һҳ</a> ";
for($i=1;$i<= $PageCount;$i++)	{ 			 //��������ҳ�������
		if ($i==$Page) echo "$i  ";
		else echo " <a href='?page=$i&keyword=$keyword'>$i</a> ";} 
if($Page== $PageCount)   echo  " ��һҳ  ĩҳ ";
else echo  " <a href='?page=" . ($Page+1) . "&keyword=$keyword'>��һҳ</a> 
 <a href='?page=" . $PageCount . "&keyword=$keyword'>ĩҳ</a> ";
echo " &nbsp ��".$RecordCount. "����¼&nbsp";	 //����������¼
echo " $Page / $PageCount ҳ";			//��ǰҳ��λ��
?></p>
