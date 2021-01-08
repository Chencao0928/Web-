<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新用户注册</title>
</head>

<body>
<form action="" method="post" name="usr_register">
<table width="300" border="1">
  <caption>
    新用户注册
  </caption>
  <tbody>
    <tr>
      <td>用户名：</td>
      <td><input type="text" name="usr_name"></td>
    </tr>
    <tr>
      <td>密码：</td>
      <td><input type="password" name="usr_pwd"></td>
    </tr>
    <tr>
      <td>确认密码：</td>
      <td><input type="password" name="usr_pwd_confirm"></td>
    </tr>
	  <tr>
      <td colspan="2"><a href="login.php">返回登录</a><input type="submit" name="sub_usr_register" value="注册"></td>
    </tr>
  </tbody>
</table>
</form>
	<?
	if(isset($_POST["sub_usr_register"])){
		//处理注册信息，检查是否合法
		$conn = mysql_connect("localhost","root","123");//连接数据库选择数据表
		mysql_query("set names utf8");
		mysql_select_db("guestbook",$conn);
		$usr_name = $_POST["usr_name"];
		$usr_pwd = $_POST["usr_pwd"];
		$usr_pwd_confirm = $_POST["usr_pwd_confirm"];

		$check_usr = "select * from login_user where usr_name='"."$usr_name'";
		//$check_usr = "select * from login_user where usr_name='马雨'";
		$res = mysql_query($check_usr,$conn);
		if($row=mysql_fetch_assoc($res)){
			echo "用户名已存在!";

		}
		else if(strlen($usr_pwd)<3 ||strlen($usr_pwd)>15){

			echo "密码长度有误！";
		}

		else if($usr_pwd!==$usr_pwd_confirm){

			echo "密码输入不一致！";
		}
		else{

			$add_sql = "insert into login_user (usr_name,usr_pwd) values('".$usr_name."','".$usr_pwd."')";
			mysql_query($add_sql) or die("注册失败！");
			echo("注册成功，即将跳转登录...");
			echo("<script>location.href = 'login.php';</script>");
		}
	}
	
	?>
	
	
	
</body>
</html>