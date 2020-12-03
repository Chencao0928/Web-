<?
header("Content-type: text/html; charset=gb2312"); 
	$user=$_GET['user'];
	$comment=$_GET['comment'];
	echo "<h3>评论人：".$user."</h3>";
	echo "<p>内容：".$comment."</p>";
?>

