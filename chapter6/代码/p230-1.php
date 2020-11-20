<?	$fp=fopen("new.txt","w+");		//以读写方式打开new.txt
fwrite($fp,'这是写入的一行话\n\r');
rewind($fp);				//将指针指向文件开头
$str=fread($fp,20); 			//读取文件中前20个字符保存到$str中
echo $str;
fclose($fp);			//关闭文件资源
?>
