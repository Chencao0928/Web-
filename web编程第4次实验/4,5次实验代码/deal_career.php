<?//验证session
session_start();
if(!$_SESSION["login_flag"]){
	
	die("<a href = login.php>to sign in...</a>");
}
if($_POST["sub_register"]){
	setcookie("cv_name",$_POST["name"],time()+3600);
	setcookie("cv_birth",$_POST["birth"],time()+3600);
	setcookie("cv_comment",$_POST["self_comment"],time()+3600);
	
	setcookie("cv_gender",$_POST["gender"],time()+3600);//radio
	setcookie("cv_addr",$_POST["addr"],time()+3600);//selection
	for($i=0;$i<count($_POST["skill"]);$i++){
		setcookie("cv_skill[$i]",$_POST["skill"][$i],time()+3600);//checkbox array
	}
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>处理简历</title>
</head>
<?
	//判断skill有几个，输出加油或者拟录用
	//写入文件，编辑功能，验证session
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$birth = $_POST["birth"];
	$addr = $_POST["addr"];
	$skill = $_POST["skill"];
	$self_comment = $_POST["self_comment"];
	$file_name = $name."cv.txt";
	$usr_cv_file = fopen($file_name,"w+");
	$cv_text = $name."\r\n".$gender."\r\n".$birth."\r\n".$addr."\r\n".implode($skill,',')."\r\n".$self_comment;
	fwrite($usr_cv_file,$cv_text);
	fclose($usr_cv_file);
	if(count($skill)>2){
		echo("拟录取");
	}
	else{
		echo("加油");
	}
?>
<body>
</body>
</html>