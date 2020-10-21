<?	session_start();					//开启Session
$_SESSION["username"]="小泥巴";		//将字符串信息存入Session
$_SESSION["username"]="张三";			//修改Session变量值
$_SESSION["age"]=21;
	$email='tang@163.com';		
$_SESSION["email"]=$email;			//将变量信息存入Session变量
$_SESSION["user"] =array('name'=>'燕子','pwd'=>'111'); 	//将数组存入Session变量
?>
