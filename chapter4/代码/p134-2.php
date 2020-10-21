<?	ob_start();
	echo "<b>Hello World</b>";		//输出到缓冲区，但不会立即输出到页面
	$len=ob_get_length();			//$len保存了当前缓冲区中内容的长度
	$out = ob_get_contents();		//$out保存了当前缓冲区中的内容
	ob_end_clean();				//清空并结束缓冲区
	echo $out.'<br>'; 				//输出<b>Hello World</b>
	$out = strtolower($out);			//将变量$out中的字符转换为小写
	var_dump($out,$len);			?>
