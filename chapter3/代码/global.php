<? 	$a="全局变量、";
function fun(){
		global $a; 		//为了引用函数外定义的变量$a
		echo $a; 	
		$a="局部变量、";		//添加static试试
		echo $a;			//输出“局部变量”
		}
	fun();		//调用函数将输出“全局变量、局部变量、”
echo $a;		//输出“局部变量、”
?>
