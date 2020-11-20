<?	ob_start(); 		//打开缓冲区 
	//执行php文件news.php，将执行结果（html格式字符串）赋给变量$str
$str=file_get_contents("http://localhost/php/schtml/admin/adminnews.php"); 
//include('adminnews.php');
//$str=ob_get_contents(); 
$fp=fopen("te.html","w"); 		//创建文件test.html
fwrite($fp, $str); 	//将字符串$str写入test.html中，test.html即为静态页文件
ob_end_clean();			//清空缓冲区内容并关闭缓冲区
echo '静态html文件生成成功，请打开目录查看';



$root=$_SERVER['DOCUMENT_ROOT'];
echo $root;

function createhtml($sourcePage,$targetPage)#来源文件，目标文件
{
#得到两个参数，一个是来源文件地址，一个是需要生成的静态页面地址


ob_start(); #打开缓冲区，相当于做了一个用来存放东西的箱子

$str=file_get_contents($sourcePage);  #在缓冲区中释放页面，从这个代码中应该可以明白一点：那就是$sourcePage页面单独查看的时候，它是可以显示的！这是关键之所在，如果后面不加ob_end_clean()函数，那在执行程序的时候你看见$sourcePage页面的内容。
$fp=fopen($targetPage,"w") or die("静态生成时打开文件".$targetPage."时出错"); 		//创建文件test.html
fwrite($fp, $str); 	//将字符串$str写入test.html中，test.html即为静态页文件
ob_end_clean();			//清空缓冲区内容并关闭缓冲区
echo '静态html文件生成成功，请打开目录查看';#清除缓冲区的内容，把箱子里面的东西转给他人后，打扫卫生，不打扫卫生的后果是让他人可以看见箱子的东西，也即可以看见$sourcePage页面的内容



fclose($fp);

}

createhtml("http://localhost/php/schtml/admin/adminnews.php","jb.html");

?> 
