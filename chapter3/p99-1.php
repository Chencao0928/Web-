<?	echo strtotime("now");		//输出时间戳：1367148939
echo strtotime("+5 hours");		//输出加5小时后的时间戳
echo '<br>'.date('Y-m-d',strtotime("+1 week")).'<br>';	//利用返回的时间戳设置时间
echo strtotime("+1 week 3 days 7 hours 5 seconds"); 	?>
