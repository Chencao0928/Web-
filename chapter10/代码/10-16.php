<?
header("Content-type: text/html; charset=utf-8"); 

require('conn.php');
$act=$_POST["act"]; 

if($act=="add")	{
   $title = unescape($_POST["title"]);	//获取10-15.php传来的数据
	$author = unescape($_POST["author"]);
	$email = unescape($_POST["email"]);
	$content = unescape($_POST["content"]);	
	$sql="Insert into lyb(title,author,email,content) values('$title','$author','$email', '$content')";
	if($conn->query($sql)) {

//----------------------------------代码段A开始---------------------
	$result=$conn->query("select * from lyb order by ID desc limit 15");
	
 while($row=$result->fetch_assoc()){		//重新输出更新后的记录集到客户端
  echo "<tr><td width='100'>".$row["title"]."</td>";
     echo "<td>".$row["content"]."</td>";
     echo "<td>".$row["author"]."</td>";
    echo "<td width='80'>".$row["email"]." </td>";
    echo "<td>".$row["ip"]." </td></tr>";
}
//----------------------------------代码段A结束----------------------------------
}}
?>
