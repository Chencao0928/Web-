<? header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
  $username=$_GET["username"];  //获得10-9.html发送来的数据
$password=$_GET["password"]; 
$act=$_GET["act"]; 
if($act=="login"){		//处理单击“注册”按钮的代码
$sql="insert into admin(`user`,`password`) values('$username','$password')";
if($conn->query($sql))
echo "欢迎 $username , 注册成功";
else echo '注册失败,原因:'. $conn->errno. $conn->error;
die();
}
$sql="select * from admin where user='$username'";    //处理检测用户名的代码
$result=$conn->query($sql);
if($result->num_rows==0) 
echo 1;		//如果没有记录则输出1，表示可以注册
?>

