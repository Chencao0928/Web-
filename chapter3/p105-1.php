<?	function aval($num){		// aval()用来求$num各位上的数字
		for($i=0;$num>=1;$i++){
			$arr[$i]=$num%10;	//对10取余得到个位数
			$num=$num/10;	}	//除以10后十位数变成个位数
		return $arr;		//$arr保存了各位上的数
	}
	print_r(aval(54262));		//调用函数，将返回各位上的数字	?>
