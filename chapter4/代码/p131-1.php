<? 
header("location:http://www.baidu.com"); 	//重定向到绝对URL
header("location:4-8.php"); 	//重定向到相对URL
header("location:?flag=1"); 	//重定向到本页，并增加查询字符串
$url='4-1.php';
header("location:$url"); 		//重定向到变量表示的网址
?>
