<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第4章第2题接收表单数据</title>
</head>

<body>
	<div>
	<?
	$usr_name = $_POST["user"];
	$addr = $_POST["addr"];
	$password = $_POST["pwd"];
	echo $usr_name."你好,您住在".$addr."您的密码是：".$password;
	?>
	
	</div>

</body>
</html>