<? session_start();
header("Content-type: text/html; charset=utf-8"); 

require('conn.php');

if($_POST['action']=="outlogin") {	//处理点击“注销”按钮的程序段
	$_SESSION["adminid"]="";		//清空Session变量
	$_SESSION["adminlogin"]="";
	loginno();
	die(); 
}
$adminid=$_POST["name"];		//获取用户名
$adminpws=$_POST["pass"];

if($adminid=="")	{	//如果获取不到用户名
	if ($_SESSION["adminlogin"]=="ok")		//但是Session变量不为空
		loginok();		//显示登录成功界面
	else
		loginno();			//显示未登录界面
} 
else {	//获取到的用户名不为空
	$sql = "select * from admin where user='$adminid ' and password='$adminpws'";
	$result=$conn->query($sql);			//对用户名和密码进行查询
	if($result->num_rows==0)	//如果查询不到
		echo "用户名或者密码错误<br><input onclick='javascript:loadlogin();' type='button' name='ok' value='返回登录' />";
	else	{		//否则就表明查询得到，登录成功
		$row=$result->fetch_assoc();
		$_SESSION["adminid"]=$row["user"];		//登录成功，设置Session变量
		$_SESSION["adminlogin"]="ok";
		loginok();		//显示登录成功界面
	}
	$result->close();
}
function loginok()	{	//输出登录成功的界面代码
	echo "欢迎您,".$_SESSION["adminid"]."<br><input onclick='javascript:outlogin();' type='button' name='ok' value='注销' />";
}
function loginno()	{	//输出未登录的界面代码
	echo "<form style='padding:0px; margin:0px;' name='form'><div id='sitename'>用户名：<input style='WIDTH: 70px' id='name' /></div><div id='siteurl'>密  &nbsp;码：<input id='pass' type='password' style='WIDTH: 70px' /></div><div id='sitesub'><input onclick='javascript:login();' type='button' name='ok' value='登录' /></div></form>";
}
?>
