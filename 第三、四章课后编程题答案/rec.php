<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第3题的题目</title>
</head>

<body>
	<?php
	//var_dump( $_POST);
	$name = $_POST["name"];
	$Sex = $_POST["Sex"];
	$hob = $_POST["hobby"];
	$car = $_POST["career"];
	
	echo $name."同学:".$Sex."，".$car."，爱好：";
	foreach($_POST["hobby"] as $key=>$value){
		echo "$value ";
	}
	?>
	
</body>
</html>