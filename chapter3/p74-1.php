<?	$output=`dir`;
echo $output;					//输出当前目录下的内容
echo shell_exec('dir ');			//输出当前目录下的内容，结果同上	

	//提示：IIS出于安全性考虑，禁止使用执行运算符，执行运算符只能在Apache中使用
?>
