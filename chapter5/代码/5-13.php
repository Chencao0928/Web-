<? 	require('conn.php'); 
if(isset($_GET['page']) && (int)$_GET['page']>0)		 //��ȡҳ�벢����Ƿ�Ƿ�
		$Page=$_GET['page'];
else	$Page=1; 	 		//�����ȡ����ҳ������ʾ��1ҳ
//����ÿҳ��ʾ��¼��
$PageSize=4; 		
$result=mysql_query("Select count(ID) from lyb",$conn); 	//����ͳ�Ƽ�¼�����Ľ����
$row=mysql_fetch_row($result);
$RecordCount=$row[0]; 	//��ȡ��¼����
	//�����ܹ��ж���ҳ
$PageCount =ceil($RecordCount/$PageSize);
		//��ĳһҳ�ļ�¼��������
$result=mysql_query("Select * from lyb limit ". ($Page-1)*$PageSize." , ".$PageSize, $conn); 
	//��ʾ��¼		?>
<h3 align="center">��ҳ��ʾ��¼</h3>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>����</th><th>����</th><th>����</th><th>email</th><th>����</th> </tr>
  <? while($row=mysql_fetch_assoc($result)){  ?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? } 
  mysql_free_result($result);  ?>
</table>
 <p><?	// ��ʾ��ҳ���ӵĴ���
if($Page== 1)	 			//����ǵ�1ҳ������ʾ��1ҳ������
		echo  "��һҳ  ��һҳ ";	
else echo " <a href='?page=1'>��һҳ</a> <a href='?page=". ($Page-1)."'>��һҳ</a> ";
for($i=1;$i<= $PageCount;$i++)	{ 		 //��������ҳ�������
		if ($i==$Page) echo "$i  ";		//�����ĳҳ������ʾĳҳ������
		else echo " <a href='?page=$i'>$i</a> ";} 
if($Page== $PageCount)   		 // ���á���һҳ������
		echo  " ��һҳ  ĩҳ ";
else echo " <a href='?page=" . ($Page+1) . "'>��һҳ</a> 
 <a href='?page=" . $PageCount . "'>ĩҳ</a> ";
echo " &nbsp ��".$RecordCount. "����¼&nbsp";	 //����������¼
echo " $Page / $PageCount ҳ";			//��ǰҳ��λ��
?></p>
