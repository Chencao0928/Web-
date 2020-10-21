<? //ob_start();
require('conn.php'); 
$title=$_POST["title"];		//获取表单元素的值
$author=$_POST["author"];
$email=$_POST["email"];
$content=$_POST["content"];
$ip=$_SERVER['REMOTE_ADDR']; 		//获得客户端IP地址
$sql="insert into lyb(title,author,email,content,ip,`date`) values('$title','$author','$email', '$content','$ip','date(Y-m-d h:i:s) ')";
//echo $sql;				输出sql语句，用于调试，可删除
mysql_query( $sql) or die('执行失败');
header("Location:5-6.php");		//插入成功后，自动转到首页
 ?>
