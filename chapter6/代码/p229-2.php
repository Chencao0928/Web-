<?	$fp=fopen("new.txt","a");			//以追加写入方式打开new.txt
fwrite($fp,'这是写入的一行话\n');
fclose($fp);			//关闭文件资源
?>
