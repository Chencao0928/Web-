<?	$b=10;	
$a="hello ";			//$a赋值为hello
$b=&$a;				//变量$b引用$a的地址
echo $a;				//输出结果为hello
$b="world ";			//修改$b的值，$a的值将一起变化
echo $a;				//输出结果为world
$a="cup";				//修改$a的值，$b的值将一起变化
echo $b;				//输出结果为cup
?>
