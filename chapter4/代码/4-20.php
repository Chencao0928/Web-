<?	if ($_POST["xm"]=="admin" && $_POST["Pwd"]=="123" )	{
setcookie("user[xm]",$_POST["xm"],time()+3600*intval($_POST['Save']));
setcookie("user[dt]",date("Y-m-d h:i:s"),time()+3600*$expire);			//写入Cookie
setcookie("user[num]",1,time()+3600*intval($_POST['Save']));
	  //保存有效期到Cookie
setcookie("user[expire]",$_POST['Save'],time()+3600*intval($_POST['Save']));
echo $_POST["xm"]."：首次光临";
		//var_dump($_COOKIE);	
		}
else
		echo "<script>alert('用户名或密码不对');location.href='4-19.php ';</script>";
?>
