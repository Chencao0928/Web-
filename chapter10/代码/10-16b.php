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

//----------------------------------代码段B开始---------------------
echo 1;
//----------------------------------代码段B结束----------------------------------
}}
?>
