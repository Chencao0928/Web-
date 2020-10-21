<?	$id=intval($_GET["id"]);			//获取URL字符串中变量id的值并转为整型
	if ($id==1) 
		echo "<p>这是第一条新闻</p>";
	elseif ($id==2)
		echo "<p>这是第二条新闻</p>";
	elseif ($id==3)
		echo "<p>这是第三条新闻</p>";
	else	echo "<p>参数非法</p>";	?>
