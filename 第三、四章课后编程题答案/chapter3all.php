<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>第三章课后习题</title>
</head>
<body>
	
    <?//第1题
	function cal($start_num , $end_num){
		$result = 0;
		for($i = $start_num ; $i<=$end_num;$i++){
			if($i%2==0){
				$result+=$i;			
			}	
		}
		return $result;
	}
	$res = cal(1,100);
	echo $res;
	?>
	
	<?//第2题
	echo "<br/>";
		for($i=1;$i<10;$i++){
			$tmp="";
			for($j=1;$j<$i+1;$j++){
				$res=$i*$j;
				$tmp.=$i."*".$j."=".$res."&nbsp";
			}
			echo $tmp;
			echo "<br/>";	
	}
	?>
	
	<?//第3题
	$i=0;
	while(pow(2,$i)!=4096){
		$i++;
		if(pow(2,$i)>4096){
			echo "4096不是2的幂指数";
			break;
		}
	}
	echo "$i";
	?>
	
	<?//第4题
	echo "<br/>";
	function find_maxnum_index($arr){
		$idx = array();
		$max_num = max($arr);
		foreach($arr as $key=>$value){
			if($arr[$key]==$max_num){
				$idx[]=$key;
			}
		}
		return $idx;
	}
	function find_minnum_index($arr){
		$idx = array();
		$min_num = min($arr);
		foreach($arr as $key=>$value){
			if($arr[$key]==$min_num){
				$idx[]=$key;
			}
		}
		return $idx;
	}
	$test_arr = array(5,8,2,3,7,6,9,1,8,4,3,0);
	$max_idx = find_maxnum_index($test_arr);
	$min_idx = find_minnum_index($test_arr);
	echo $max_idx[0];
	echo "和";
	echo $min_idx[0];
	?>
	
	<?//第5题
	echo "<br/>";
	function reverse_str($str){
		$res = "";
		for($i = 0; $i < strlen($str);$i++){
			$res = $str[$i].$res;
		}
		return $res;
	}
	$test_str = "nihao";
	echo reverse_str($test_str);
	?>
	
	<?//第6题
	echo "<br/>";
	function get_extra_name($file_name){
		$arr = explode(".",$file_name);
		$res = end($arr);//访问数组中的最后一个元素
		return $res;
	}
	$test_filename = "hello.php";
	echo get_extra_name($test_filename);
	?>
	
	<?//第7题
	echo "<br/>";
	function show_number1($num){
		
	}
	function show_number2($num){
		$tmp = (string)($num);
		$arr = array();
		for($i=0;$i<strlen($tmp);$i++){
			$arr[]=$tmp[$i];
		}
		return $arr;
	}
	$num = 132;
	var_dump(show_number2($num));
	
	?>
	
	<?//第8题
	echo "<br/>";
	function four_power($x){	
		return pow($x,4);
	}
	$i = 16;
	echo four_power($i);
	?>
	
	<?//第9题
	echo "<br/>";
	function isPrime($x){
		$mid_num = ceil($x/2);
		for($num=2;$num<=$mid_num;$num++){
			if($x%$num==0){
				return false;
			}
		}
		return true;
	}
	
	for($i=2;$i<=100;$i++){
		if(isPrime($i)){
			echo $i." ";
		}
	}
	?>
	
	<?//第10题
	echo "<br/>";
	function isEven($x){
		if($x%2==0) return true;
		return false;
	}
	$num = 5;
	if(isEven($num)){
		echo "$num is Even";
	}
	else{
		echo "$num is not Even";
	}
	?>
	
	<?//第11题
	echo "<br/>";
	function ConvertStyle($str){
		$tmp = explode("_",$str);
		$newStyle = array();
		foreach($tmp as $value){
			$newStyle[] = ucfirst($value);
		}
		$res = "";
		foreach($newStyle as $value){
			$res = $res.$value;
		}
		return $res;
	}
	$test_str = "how_are_you";
	echo ConvertStyle($test_str);
	?>
	
	<?//第12题
	echo "<br/>略";//使用max、min、sum函数
	
	
	
	
	?>
	
	<?//第13题
	echo "<br/>略";
	?>
	
	<?//第14题
	echo "<br/>";
	function relative_path($pathA,$pathB){
		$rela_path = array();
		$pathA_arr = explode("/",$pathA);
		$pathB_arr = explode("/",$pathB);
		$LEN_A = count($pathA_arr);
		$LEN_B = count($pathA_arr);
		$LEN = min($LEN_A,$LEN_B);
		for($i=0;$i<$LEN;$i++){
			if($pathA_arr[$i]!==$pathB_arr[$i]){
				break;
			}
		}
		for($j = 0;$j<$LEN_B-($i+2);$j++){//"i+1"为相同的文件路径层数
			$rela_path[] = "..";
		}
		for($k = $i;$k<$LEN_A;$k++){
			$rela_path[] = $pathA_arr[$k];
		}
		return $rela_path;//对输出再稍加调整即可

	}
	$a = "/c/d/e/123/456/789.jpg";
	$b = "/c/d/e/55/12.jpg";
	$rela_path = relative_path($a,$b);
	var_dump($rela_path);
	?>
	
</body>
</html>