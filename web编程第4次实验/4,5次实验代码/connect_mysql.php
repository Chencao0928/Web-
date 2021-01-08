<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>连接数据库</title>
</head>
<?
	$conn = mysql_connect("localhost","root","123");//连接数据库选择数据表
	mysql_query("set names utf8");
	mysql_select_db("guestbook",$conn);
	/*
	$sqlstr = "select * from login_user";
	$result = mysql_query($sqlstr);
	while($row = mysql_fetch_assoc($result)){
		echo($row["usr_name"]);
		echo($row["usr_pwd"]);
	}
	*/
	?>
<body>
</body>
</html>
