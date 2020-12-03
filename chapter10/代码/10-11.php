<? header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
//获得10-10.html发送来的数据
$username=$_POST['userName'];
$pwd = $_POST['userPwd'];   

$sql="select * from admin where user='$username' and password='$pwd'";
$result=$conn->query($sql);
if($result->num_rows==0)	//如果结果集为空
	echo "用户名或密码错误，登录失败";
else
	echo  "登录成功，欢迎：$username";

?>
