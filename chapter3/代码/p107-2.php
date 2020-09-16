<?  function add1(&$val){
			$val++;
			return $val;	}
	$age=18;
	echo add1($age).' '; 	//注意传地址赋值时，函数参数不能是常量
	echo add1($age).' ';
	echo $age; 		//运行结果为19 20 20		?>
