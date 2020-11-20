<?	file_put_contents('news.txt','第一次');		//写入字符串
		$data='要写入的数据';
		$num=file_put_contents('news.txt',$data,FILE_APPEND);		//追加方式写入
		echo $num; 			//返回写入的字节数	?>
