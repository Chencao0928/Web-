<?	$fp=fopen("new.txt","w");		//以写入方式打开new.txt
		fwrite($fp,'这是写入的一行话\n');
		fwrite($fp,'最多写入12个字符\n',12);
		fclose($fp);			//关闭文件资源
?>
