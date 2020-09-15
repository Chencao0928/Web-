<?	$today=getdate();
		print_r($today); 			//$today是getdate()函数返回的数组
echo "$today[mon]月$today[mday]日"; 	// mon和mday是数组元素的下标
?>
