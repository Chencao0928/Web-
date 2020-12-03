<?
header("Content-type: text/html; charset=utf-8"); 

require('conn.php');
$act=$_REQUEST["act"]; 
//$act="load";
if($act=="load") {		//如果是请求载入评论
	$result=$conn->query("select * from lyb order by ID desc limit 3");

	if($result->num_rows>0) {
  while($row=$result->fetch_assoc()){
  ?>
  <div style="border:1px solid #CCC;margin:5px;">
   网友：<?= $row["author"] ?> 发表于<?= $row["date"] ?><br/>
	标题：<?= $row["title"] ?><br/>
   <?= $row["content"] ?> Email：<?= $row["email"] ?>
  </div>
  <? }} 
else	echo "<p>目前还没有用户留言</p>";
}
if($act=="add") {	  
//'如果是发表评论
   $title = unescape($_POST["title"]);	//获取10-16.php传来的数据
	$author = unescape($_POST["author"]);
	$email = unescape($_POST["email"]);
	$content = unescape($_POST["content"]);	
	$date=date("Y-m-d h:i:s");
	$sql="Insert into lyb(title,author,email,content,date) values('$title','$author','$email', '$content','$date')";	

	if($conn->query($sql)) echo 1;
} ?>
