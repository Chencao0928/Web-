<? header("Content-type: text/html; charset=gb2312"); 
require('conn.php');
$Bigclass=unescape($_GET["Bigclass"]);	//��ȡ10-13.html������������
$n=unescape($_GET["n"]);

 
if($n==1) {		//�����Ҫ����ͷ������
$sql="select * from news where BigClassName in('ѧ������','����԰��','���гɹ�','���ڹ���') order by ID desc limit 1";
$result=$conn->query($sql);
$row=$result->fetch_assoc();	 
echo $row['ID'].'|'.Trimtit($row['title'],12).'|'.Trimtit(strip_tags($row['content']),40).'|'. noyear($row['infotime']);
	die();	}
$sql="select * from news where BigClassName ='$Bigclass' order by ID desc limit $n"; 
$result=$conn->query($sql);		//��ѯ��Ŀ�е�����
 while($row=$result->fetch_assoc()) 
 	echo "<tr><td class='xinwen'><a href='onews.php?id=".$row['ID']."'>". Trimtit($row['title'],23)."</a></td></tr>";


?>
