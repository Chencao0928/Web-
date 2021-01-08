<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>木地酒庄实训项目</title>
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/header.css" type="text/css" rel="stylesheet">
<link href="css/spxq.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/chanping.js"></script>
</head>

<body>
<div class="box">
	<!--头部区域-->
	<div class="topbox">
		<div class="top">
			<a href="index.html"><img src="images/top-logo.png" class="top-logo"></a>
			<ul>
				<li><i class="fa fa-star" aria-hidden="true"></i><a href="">中文</a></li>
				<li><i class="fa fa-star" aria-hidden="true"></i><a href="#">English</a></li>
			</ul>
		</div>
	</div>
	<!--注册成功信息显示区域-->
	<div class="regbox" align="center">
<h2>
	<?
	$LocationArray=array("重庆","北京","上海","天津");
	$HobbyArray=array("跳舞","唱歌","跑步");
	$UserName=$_POST["usr_name"];
	$UsrPwd=$_POST["usr_pwd"];
	$UsrSex = $_POST["usr_sex"];
	$UsrLocation = $_POST["usr_location"];
	$UsrHobby = $_POST["hobby"];
	$UsrSign = $_POST["usr_sign"];
	$echosex = "";
	$HobbyNum = count($UsrHobby);
	
	
	if($UsrSex==1) $echosex="先生";
	else if($UsrSex==2) $echosex="女士";
	else $echosex="先生/女士";
	
	echo "来自".$LocationArray[$UsrLocation]."的".$UserName.$echosex.",您好！</h2>";
	echo "<br/>";
	echo "您选择了".$HobbyNum."项爱好：";
	for($i=0;$i<$HobbyNum;$i++){
		echo "$UsrHobby[$i] ";
	}
	echo "<br/>您的个性签名是：".$UsrSign;
	?>
	</div>
	<!--内容区域-->

	<!--页脚区域-->
	<div class="footbox">
    	<div class="foot">
			<div class="huiding"><a href="#">
				<i class="fa fa-arrow-up" aria-hidden="true"></i>
		   </a></div>
			<ul>
				<li><a href="lxwm.html">联系我们</a></li>
				<li><a href="jianjie.html">公司简介</a></li>
				<li><a href="new.html">公司新闻</a></li>
				<select class="f-xl">
					<option>友情链接</option>
					<option>翁丰统</option>
					<option>胡家俊</option>
					<option>张铭聪</option>
				</select>
			</ul>

			<p class="f-small">Copyright @ 2010-2016 木地酒庄有限公司 wengfengtong 更多模板：<a href="http://www.mycodes.net/" target="_blank"/>源码之家</p>
			<p class="f-sj">劝君更尽一杯酒<br/><span>满韵香含唯此家</span></p>
       		<img src="images/foot-logo.jpg" style="position:absolute;bottom:10px;right:30px; ">
        </div>
    </div>
	
</div>
</body>
</html>