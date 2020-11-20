<html><body>
	<h2 align="center">读取已有文本文件</h2>
<?
$file=fopen("test.txt","r");	//以只读方式打开test.txt
$str=fread($file,filesize("test.txt"));		//读取文件的全部内容
echo nl2br($str);		//将内容中的回车转<br>再输出
var_dump(filesize("test.txt"));
fclose($file);			//关闭文件
?>
</body></html>
