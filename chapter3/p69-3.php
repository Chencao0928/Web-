<? 	$a="全局变量、";
function fun(){
		echo $GLOBALS['a'];	
		$a="局部变量、";
		echo $a;			//输出“局部变量”
		}
fun();				//调用函数将输出“全局变量、局部变量、”
echo $a;			//输出“全局变量”
?>
