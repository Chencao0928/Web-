<? 
	 //注意：该程序只能在PHP 5.3以上版本运行

	$greet=function($name){		 //定义匿名函数，并将其赋给变量$greet
    echo 'hello '.$name;	};
		$greet('World'); 	 //调用匿名函数，输出hello World
		$greet('PHP');		?>
