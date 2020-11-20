<?	$fp=fopen("count.txt","r+");
		$Visitors=intval(fgets($fp));			//读取文件中的内容
		$Visitors++;   		 	//将计数器加1
		rewind($fp);				 //将文件指针指向开头，以便重新写
		fwrite($fp,$Visitors);		//将计数器值写入count.txt文件之中
		fclose($fp);	?>
<html><body>
		<h2>欢迎进入PHP的世界</h2><hr>
		您是本站第<?=$Visitors ?>位贵宾。
</body></html>
