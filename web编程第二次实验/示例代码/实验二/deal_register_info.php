<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">

    <title>DealForm</title>
</head>
<body>
    <div style="background-color:antiquewhite;">
		
        <?
        $LocationArray=array("重庆","上海","北京","天津");
        $HobbyArray=array("篮球","乒乓球","羽毛球");
        $UserName=$_POST["usr_name"];
        $UsrPwd=$_POST["usr_pwd"];
        $UsrGender = $_POST["usr_gender"];
        $UsrLocation = $_POST["usr_location"];
        $UsrHobby = $_POST["usr_hobby"];
        $UsrSign = $_POST["usr_sign"];
        $UsrBirth=$_POST["usr_birth"];
        $echogender = "";
        $HobbyNum = count($UsrHobby);
		$up_file = $_FILES["upload_file"];
		$up_file_name = $up_file["name"];
		
        if($UsrGender==1) $echogender="先生";
        else if($UsrGender==2) $echogender="女士";
        else $echogender="先生/女士";
        echo "<h2>来自".$LocationArray[$UsrLocation]."的".$UserName.$echogender.",您好！</h2>";
        echo "您选择了".$HobbyNum."项爱好：";
        for($i=0;$i<$HobbyNum;$i++){
            echo "$HobbyArray[$i] ";
        }
		echo "<br/>附件：".$up_file_name."已成功上传！";
        echo "<br/>您的生日是：".$UsrBirth;
        echo "<br/>您的备注信息是：".$UsrSign;
        ?>
    </div> 
</body>
</html>