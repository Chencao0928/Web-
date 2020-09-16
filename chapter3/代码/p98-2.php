<?	$nextWeek = time() + (7 * 24 * 60 * 60); 	//1周=7天*24小时*60分*60秒
echo '现在是：'. date('Y-m-d') ."<br>";
echo '下一周是: '. date('Y-m-d', $nextWeek) ;		?>
