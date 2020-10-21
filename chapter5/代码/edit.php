<? 	require('conn.php'); 
$id=intval($_GET['id']);				//获取记录id	
$title=$_POST["title"];				//获取表单中数据
$author=$_POST["author"];
$email=$_POST["email"];
$content=$_POST["content"];
$ip=$_SERVER['REMOTE_ADDR']; 			//获取客户端IP
$sql="Update lyb Set title='$title',author='$author',email='$email',content='$content' Where ID=$id";
mysql_query( $sql) or die('执行失败');
echo "<script>alert('留言修改成功！');location.href='5-6.php';</script>";
 ?>
