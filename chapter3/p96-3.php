<?	$email="tangsix@163.com";		
if (strpos($email, "@") && strpos($email, ".")&& strpos($email, "@")<strpos($email, "."))
echo "Email格式正确<br/>";
	//判断IP地址是否正确，用到了explode函数
$IP="59.51.24.54";
$arr=explode(".",$IP);
if (count($arr)==4) 
echo "IP格式正确，IP前两位为 $arr[0].$arr[1].*.*";	?>
