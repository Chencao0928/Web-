<? header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
  $username=$_GET["username"];  //获得10-9.html发送来的数据

$sql="select * from admin where user='$username'";
$result=$conn->query($sql);

if($result->num_rows==0)   //判断结果集是否为空
	echo "<font color=#0000ff>可以注册</font>";
else
	echo "<font color=#ff0000>此用户名已经注册</font>";
?>
