<html><body>
<?	 $flag=$_GET["flag"]; 		//获取url变量flag的值
if ($flag=='1') 
		echo '欢迎 '.$_POST['user']. ' 光临!';
else	 	//没有按提交按钮时
		echo '<form method="post" action="?flag=1">
 			姓名：<input name="user" type="text" size="15" />
 			<input type="submit" value="提交" />
			</form>';		?>
</body></html>
