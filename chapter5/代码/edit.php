<? 	require('conn.php'); 
$id=intval($_GET['id']);				//��ȡ��¼id	
$title=$_POST["title"];				//��ȡ��������
$author=$_POST["author"];
$email=$_POST["email"];
$content=$_POST["content"];
$ip=$_SERVER['REMOTE_ADDR']; 			//��ȡ�ͻ���IP
$sql="Update lyb Set title='$title',author='$author',email='$email',content='$content' Where ID=$id";
mysql_query( $sql) or die('ִ��ʧ��');
echo "<script>alert('�����޸ĳɹ���');location.href='5-6.php';</script>";
 ?>
