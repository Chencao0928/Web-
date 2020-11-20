<? 
////ob_start(); //打开缓冲区 
////echo "Hello\n"; //输出 
//$cacheStr=file_get_contents("adminnews.php"); // 
// echo $cacheStr;
////$cacheStr=ob_get_contents();
//$handle=fopen("jb51.html","w"); 
//fwrite($handle, $cacheStr); 
//ob_clean(); 

function createStaticPage($sourcePage,$objectPage)#来源文件，目标文件
{
#得到两个参数，一个是来源文件地址，一个是需要生成的静态页面地址
global $db; #数据库连接用的，在$sourcePage中需要用到

ob_start(); #打开缓冲区，相当于做了一个用来存放东西的箱子

include $sourcePage; #在缓冲区中释放页面，从这个代码中应该可以明白一点：那就是$sourcePage页面单独查看的时候，它是可以显示的！这是关键之所在，如果后面不加ob_end_clean()函数，那在执行程序的时候你看见$sourcePage页面的内容。

$cons=ob_get_contents(); #得到缓冲区中的内容，这里的内容就是HTML代码！这相当于把箱子里面的东西转给了一个人！

ob_end_clean(); #清除缓冲区的内容，把箱子里面的东西转给他人后，打扫卫生，不打扫卫生的后果是让他人可以看见箱子的东西，也即可以看见$sourcePage页面的内容

$fp=fopen($objectPage,"wb") or die("静态生成时打开文件".$objectPage."时出错");

fwrite($fp,$cons); #把HTML代码写入静态文件中！

fclose($fp);

return true;
}

createStaticPage("adminnews.php","jb55.html");

?> 
