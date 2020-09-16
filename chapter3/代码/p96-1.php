<?	$content = "《Web标准网页设计与ASP》";		//假设这是待查询信息
$find= "网页设计";			//假设这是查询关键词
$out=str_ireplace($find,"<b style='color:red'>$find</b>",$content);
echo $out."<br>";	?>
