<?	$i = 'Tom & Mary';	
	echo $i[1] . $i[4];		//输出结果为o&，因为空格也算一个字符
	
	echo strlen('喜欢PHP!');
	
	echo mb_strlen('喜欢PHP!',"gb2312");	
?>
