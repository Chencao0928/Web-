<? 	require('conn.php');
require('5-15.php'); 		 //���÷�ҳ���������ļ�
if(isset($_GET['Page']) && (int)$_GET['Page']>0)			 //��ȡҳ��
		$Page=$_GET['Page'];
else	$Page=1;
$PageSize=4; 		//����ÿҳ��ʾ��¼��
$result=mysql_query("Select ID from lyb",$conn); 		//���������
$RecordCount=mysql_num_rows($result); 		//��ȡ��¼����
	//ɾ����ԭ�������м���$PageCount�Ĵ���
$result=mysql_query("Select * from lyb", $conn); 
	//��ʾ��¼		?>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
    <th>����</th><th>����</th><th>����</th><th>email</th>
    <th>����</th> </tr>
  <? 		//��ָ��ָ���$Pageҳ��1����¼
  mysql_data_seek($result,($Page-1)*$PageSize);
  for($i=0;$i<$PageSize;$i++){
		 $row=mysql_fetch_assoc($result); 
 	 if($row){ 		//�����¼��Ϊ�գ���������ĩҳ�����
 ?>
  <tr><td ><?= $row['ID'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } } 
  mysql_free_result($result);  ?>
</table>
<?	$url = $_SERVER["PHP_SELF"];		//��õ�ǰҳ��URL
page($RecordCount,$PageSize,$Page,$url,$keyword); 	//���÷�ҳ����
?>
