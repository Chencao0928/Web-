<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第三次实验</title>
</head>

<body>
	<?//第一题，插入排序
	$arr = array(4,6,2,3,1,8);
	//var_dump(sizeof($arr));
	
	for($i=1;$i<sizeof($arr);$i++){
		$tmp = $arr[$i];
		for($j=$i-1;$j>=0;$j--){
			if($tmp<$arr[$j]){
				$arr[$j+1]=$arr[$j];
				$arr[$j] = $tmp;
			}
			else break;
			
		}
	}
	
	foreach($arr as $value){
		echo $value." ";
	}
	
	?>
<br/>
	<?//第二题,给定输入的身份证号码，首先检查其合法性（长度）,然后提取其生日，性别，年龄信息，并输出。
	
	$ID_num = "500101200201017475";
	if(strlen($ID_num)!=18){
		die("请输入正确的身份证号码！");
	}
	//性别，生日，年龄

	$gender_symbol =$ID_num[16];
	if($gender_symbol%2==0){
		$gender = "女 ";
		
	}
	else{
		$gender = "男 ";
	}
	echo $gender;
	
	$birth = substr($ID_num,6,8);
	$birth = date("Y-m-d",strtotime($birth));//字符转为日期格式
	echo "生日:".$birth." ";
	//echo(date("Y-m-d"));
	
	$time_birth = strtotime($birth);//日期转为时间戳
	$time_now = strtotime(date("Y-m-d"));
	$year_to_sec = 365*24*60*60;
	$year_diff = floor(abs($time_now-$time_birth)/$year_to_sec);
	
	echo("今年".$year_diff."岁");
	?>
	<br/>
<?
//盛水容器问题,双指针两边流水
	function maxWater($arr){
		$ans = 0;
		$left = 0;
		$right = count($arr)-1;
		while($left<$right){
			$left_h = $arr[$left];
			$right_h = $arr[$right];
			if($left_h<=$right_h){//从低的一边流水
				while($left<$right && $arr[$left]<=$left_h){
                    $ans += ($left_h - $arr[$left]);
                    $left++;
                }
			}
			else{
				while($left<$right && $arr[$right]<=$right_h){
                    $ans += ($right_h - $arr[$right]);
                    $right--;
				}
			}		
		}
		return $ans;
	}
	$test_arr = array(5,3,1,4,6,2,3,1,4);
	$water_volume = maxWater($test_arr);
	echo $water_volume;
	
?>
	
	
</body>
</html>
