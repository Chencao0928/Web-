<? $str1="PHP变量1";				//该变量为字符串变量
	$num=10+2*9;					//该变量为数值型变量
	$_date="2013-9-8";				//该变量为字符串变量，PHP无日期型数据类型
	$bol=true;						//该变量为布尔型变量
	$num='赋值字符串'; 			//通过赋值改变变量的数据类型
	$str1=$num+$_date;
var_dump($num,$_date,$bol); 			// var_dump函数可输出变量的类型
	?>
