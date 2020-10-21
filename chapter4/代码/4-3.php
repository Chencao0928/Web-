<html><body>
<form method="post" action="">
  用户名:<input type="text" name="userName"  size="12">
  密码:<input type="text" name="PS"  size="10">
  <input type="submit" name="denglu" value="登陆">
</form>
<?
if(isset($_POST['denglu'])) {			//判断用户是否提交了表单（即单击了提交按钮）
	$userName=$_POST["userName"];
	$PS=$_POST["PS"];
	echo "您输入的用户名是:".$userName;
	echo "<br>您输入的密码是:".$PS;	}	?>
</body></html>
