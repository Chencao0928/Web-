<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
  $id=$_GET["id"];  //获得$.get()发送来的id
$sql="Select * From link Where id=$id";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		echo "<li>编号：".$row['id']."</li>";
		echo "<li>网站名：".$row['name']." </li>";
		echo "<li>URL地址：".$row['URL']." </li>";
		echo "<li>介绍：".$row['intro']." </li>";
	}}
else	echo "没有搜索到信息";
 ?>

