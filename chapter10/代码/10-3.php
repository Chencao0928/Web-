<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
$result=$conn->query("Select * From lyb limit 4 "); 

$row=$result->fetch_assoc();
$str=implode('|',$row);//将数组各元素用“|”连接起来
echo $str;		//输出用“|”分隔的特殊字符串
?>


