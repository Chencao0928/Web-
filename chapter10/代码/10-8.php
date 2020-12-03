<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
  $shengid=$_GET["index"];  //获得$.getJSON发送来的数据
$sql="select * from city where Shengid=$shengid order by shiorder";


$city= "[";			//$city用来保存JSON格式字符串
$i=0;
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){		//循环输出JSON格式数据
 $city = $city."{ID:".$row["shiorder"].", shi: '".$row["shiname"]."'}";

	if($result->num_rows!=++$i) $city = $city.',';	//如果不是最后一条记录
}

$city = $city."]";
echo $city;
?>


