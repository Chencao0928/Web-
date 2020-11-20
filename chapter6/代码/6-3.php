<?
$fp=fopen("test.txt","r") or die('文件打开失败');		//以只读方式打开test.txt
echo ftell($fp).'<br>';			//输出刚打开文件时指针的位置，为0
echo fread($fp,10).'<br>';			//读取文件中前10个字符
echo ftell($fp).'<br>';			//文件指针已移动到第11个字节处，输出10
fseek($fp,100,1);			//文件指针从当前位置向后移动100个字节
echo ftell($fp).'<br>';			//当前文件指针在110字节处
echo fread($fp,10).'<br>';			//读取110到119字节数的字符串
fseek($fp,-10,2);				//将指针从文件末尾向前移动10个字节
echo fread($fp,10).'<br>';			//输出文件中最后10个字符
rewind($fp);				//将指针移动到文件开头
echo ftell($fp).'<br>';		//指针在文件开头位置，输出0
fclose($fp);				//关闭文件资源	?>
