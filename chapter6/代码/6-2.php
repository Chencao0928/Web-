<?	$file=fopen("test.txt","r");	//以只读方式打开test.txt
while(!feof($file)){			//利用循环依次读取每一行
		$str=fgets($file);	//读取文件中的一行，读取完后指针会指向下一行
		echo $str."<br>";	//输出读取的一行，再输出<br>
}
fclose($file);	//关闭文件	?>
