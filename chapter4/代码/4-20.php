<?	if ($_POST["xm"]=="admin" && $_POST["Pwd"]=="123" )	{
setcookie("user[xm]",$_POST["xm"],time()+3600*intval($_POST['Save']));
setcookie("user[dt]",date("Y-m-d h:i:s"),time()+3600*$expire);			//д��Cookie
setcookie("user[num]",1,time()+3600*intval($_POST['Save']));
	  //������Ч�ڵ�Cookie
setcookie("user[expire]",$_POST['Save'],time()+3600*intval($_POST['Save']));
echo $_POST["xm"]."���״ι���";
		//var_dump($_COOKIE);	
		}
else
		echo "<script>alert('�û��������벻��');location.href='4-19.php ';</script>";
?>
