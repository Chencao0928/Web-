<? //ob_start();
require('conn.php'); 
$title=$_POST["title"];		//��ȡ��Ԫ�ص�ֵ
$author=$_POST["author"];
$email=$_POST["email"];
$content=$_POST["content"];
$ip=$_SERVER['REMOTE_ADDR']; 		//��ÿͻ���IP��ַ
$sql="insert into lyb(title,author,email,content,ip,`date`) values('$title','$author','$email', '$content','$ip','date(Y-m-d h:i:s) ')";
//echo $sql;				���sql��䣬���ڵ��ԣ���ɾ��
mysql_query( $sql) or die('ִ��ʧ��');
header("Location:5-6.php");		//����ɹ����Զ�ת����ҳ
 ?>
