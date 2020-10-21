<?	$filename="test.gif";			//指定文件名
	header('Content-Type: image/gif');		//指定下载文件类型
	header('Content-Disposition: attachment; filename="'.$filename.'"');	 //下载文件的描述
	header('Content-Length: '.filesize($filename));		//下载文件的大小         
	readfile($filename);			//将文件内容读取出来并直接输出，以便下载
?>
