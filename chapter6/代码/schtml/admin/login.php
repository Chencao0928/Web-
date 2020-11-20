<?php 
ob_start();	
session_start();
require_once("../inc/conn.php");?>
<HTML>
<HEAD>
<TITLE>管理员登陆</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
	if($_POST["Submit"]=="登陆")
	{
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		$code=$_POST["code"];
		if($code<>$_SESSION["auth"])
		{
		?>
		<script language="javascript">
			alert("验证码不正确")
			location.href="login.php";
		</script>
		<?php
			die();
		}
		$sql="select * from admin where username='$username' and password='$pwd'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)==1)
		{
			$_SESSION["pwd"]=$_POST["pwd"];
			$_SESSION["admin"]=session_id();
			header("location:index.php");
		}
		else
		{
		?>
		<h2 style="color:#FF0000" align="center">用户名或密码错误</h2>
		<h3 align="center"><a href="login.php">返回</a></h3>
		<?php
		die();
		}
	}
?>
<table width=100% height=100% align=center valign=middle background="images/loginbg.gif" >
<tr>
    <td align=center> 
      <table border="0" cellspacing="0" cellpadding="0">
    <tr>
          <td width="323" height="202" background="Images/login1.gif">　</td>
          <td width="323" height="202" background="Images/login2.gif" valign="bottom" align=center> 
            <table border=0 width=92% cellspacing="1" cellpadding="2" >
		<form id="frm" name="frm" method="post" action="" onSubmit="return check()">
		<tr><td>
			<INPUT name=username type=text id="username" style="BORDER-RIGHT: #ffffff 0px solid; BORDER-TOP: #ffffff 0px solid;  FONT-SIZE: 9pt; BORDER-LEFT: #ffffff 0px solid; BORDER-BOTTOM: #ffffff 0px solid; HEIGHT: 16px" title="请填写用户名" size=16 maxLength=16>
		</td></tr>
		<tr><td>
			<INPUT name=pwd type=password id="pwd" style="BORDER-RIGHT: #ffffff 0px solid; BORDER-TOP: #ffffff 0px solid;  FONT-SIZE: 9pt; BORDER-LEFT: #ffffff 0px solid; BORDER-BOTTOM: #ffffff 0px solid; HEIGHT: 16px" title="请填写用户名" size=16 maxLength=16></td></tr>
		<tr><td>
			<input name="code" type="text" id="code" size="4" />&nbsp;<img src="verify.php" style="vertical-align:middle" />
			</td>
                </tr>
		<tr><td height="32">
		           <input type="submit" name="Submit" value="登陆" />
                    &nbsp;  <input type="reset" name="Submit2" value="取消" /> 
                  </td>
                </tr>
		</form>
		</table>       
          </td>
    </tr>
    <tr>
          <td width="323" height="202" background="Images/login3.gif"></td>
          <td width="323" height="202" background="Images/login4.gif"></td>
    </tr>
  </table>

    </td>
</tr>
</table>