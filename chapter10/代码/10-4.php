<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
$result=$conn->query("Select * From lyb limit 4 "); 
$i=0;
while($row=$result->fetch_assoc()){
	$str=$str.implode('|',$row);//将数组各元素用“|”连接起来
	if($result->num_rows!=++$i) 
		$str=$str.'$';	//如果不是最后一条记录
}
echo $str;		//输出用“$”分隔的特殊字符串
?>


