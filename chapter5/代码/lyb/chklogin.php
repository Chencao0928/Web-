<? session_start();
 require('conn.php');
$admin=$_POST['admin'];
$password=$_POST['password'];
$sql="select * from admin where user='$admin' and password='$password'";
$result=$db->query($sql);
if ($result->rowCount()==0){
	unset($_SESSION['admin']);
	echo "<SCRIPT>alert('��������û��������벻��ȷ��');history.go(-1)</SCRIPT>";
	exit();}
else{
	$row=$result->fetch(1);
	$_SESSION['admin']=$row['user'];
	echo "<SCRIPT>location.href='../5-6.php'</SCRIPT>";}
?>

