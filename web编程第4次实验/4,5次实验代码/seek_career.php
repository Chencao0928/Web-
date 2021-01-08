<?
session_start();
//限制未登录用户直接访问此页面
if(!$_SESSION["login_flag"]){
	die("<a href = login.php>to sign in...</a>");
}
//设置cookie，6分钟过期
if($_POST["rember_usr"]){
	setcookie("name",$_POST["usr_name"],time()+3600);
	setcookie("pwd",$_POST["usr_pwd"],time()+3600);
}
else{
	setcookie("name");
	setcookie("pwd");
}
//setcookie("rember_login_usr",$_POST["name"],time()+3600);


?>
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>创建简历</title>
	</head>

	<body>
		<?
		//处理登录信息，检查是否已在数据库中
		$conn = mysql_connect("localhost","root","123");//连接数据库选择数据表
		mysql_query("set names utf8");
		mysql_select_db("guestbook",$conn);
		$usr_name = $_POST["usr_name"];
		
		$check_usr = "select * from login_user where usr_name='"."$usr_name'";
		//$check_usr = "select * from login_user where usr_name='马雨'";
		$res = mysql_query($check_usr,$conn);


		if($row=mysql_fetch_assoc($res)){
			if($row['usr_pwd']!==$_POST["usr_pwd"]) {
			echo ("用户名或密码错误！");
			die("<a href = login.php>to sign in...</a>");	
			}
		//cv表单
		?>	

	<form name="usr_cv" action="deal_career.php" method="post">
	<table width="350" border="1">
	  <caption>

	  </caption>
	  <tbody>
		<tr>
		  <td>姓名：</td>
		  <td><input type="text" name="name" value= <?="'".$_COOKIE['cv_name']."'"?>></td>
		</tr>
		<tr>
		  <td>性别：</td>
		  <td>男<input type="radio" name="gender" value="男" <? if($_COOKIE['cv_gender']=="男") echo "checked=\"checked\""?>>女<input type="radio" name="gender" value="女" <? if($_COOKIE['cv_gender']=="女") echo "checked=\"checked\""?>></td>
		</tr>
		<tr>
		  <td>生日：</td>
		  <td><input type=date name="birth" value= <?="'".$_COOKIE['cv_birth']."'"?>></td>
		</tr>
		<tr>
		  <td>工作地：</td>
		  <td><select name="addr">
			  <option value="北京" <? if($_COOKIE['cv_addr']=="北京") echo "selected=\"selected\""?>>北京</option>
			  <option value="天津" <? if($_COOKIE['cv_addr']=="天津") echo "selected=\"selected\""?>>天津</option>
			  <option value="上海" <? if($_COOKIE['cv_addr']=="上海") echo "selected=\"selected\""?>>上海</option>
			  <option value="重庆" <? if($_COOKIE['cv_addr']=="重庆") echo "selected=\"selected\""?>>重庆</option>
			  </select></td>
		</tr>
		<tr>
		  <td>技能：</td>
		  <td>
			  c++<input type="checkbox" name="skill[]" value="c++" <? if( in_array("c++",$_COOKIE['cv_skill']?$_COOKIE['cv_skill']:array()) ) echo "checked=\"checked\""?>>
			  java<input type="checkbox" name="skill[]" value="java" <? if( in_array("java",$_COOKIE['cv_skill']?$_COOKIE['cv_skill']:array()) ) echo "checked=\"checked\""?>>
			  python<input type="checkbox" name="skill[]" value="python" <? if( in_array("python",$_COOKIE['cv_skill']?$_COOKIE['cv_skill']:array()) ) echo "checked=\"checked\""?>>
			  php<input type="checkbox" name="skill[]" value="php" <? if( in_array("php",$_COOKIE['cv_skill']?$_COOKIE['cv_skill']:array()) ) echo "checked=\"checked\""?>>
			</td>
		</tr>
		<tr>
		  <td>自我评价：</td>
		  <td><textarea cols="30" name="self_comment"><?=$_COOKIE['cv_comment']?></textarea></td>
		</tr>
		<tr>
		  <td colspan="2" align="center"><input type="submit" name="sub_register" value="提交"></td>
		</tr>
	  </tbody>
	</table>
	</form>
	
	<?	
	} else{die("无此用户, <a href = login.php>to sign in...</a>");} 
	?>
</body>
</html>