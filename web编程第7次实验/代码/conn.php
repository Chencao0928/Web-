<?
//连接数据库
$conn = mysql_connect("localhost","root","123");
mysql_query("set name utf8");
mysql_select_db("guestbook",$conn);
?>