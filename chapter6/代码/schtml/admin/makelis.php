<?	$lanmu=$_GET["lanmu"];
$lanmu='经验分享';
//$conn=mysql_connect("localhost","root","111");
//mysql_query("set names 'gb2312'");
//mysql_select_db("guestbook",$conn);
require('conn.php');
//if(isset($_GET['page']) && (int)$_GET['page']>0)			 //获取页码
//	$Page=$_GET['page'];
//else
//	$Page=1;
	
	$PageSize=2; 		
$result=mysql_query("Select * from newscontent where bigclass='$lanmu'",$conn); 		//创建结果集
$RecordCount=mysql_num_rows($result);
//mysql_free_result($result);

	//计算有多少页

 $PageCount =ceil($RecordCount/$PageSize);
 
 for($i=1;$i<=$PageCount;$i++){
 $url='http://localhost/php/8/example/8.1/5-10.php?page='.$i;
 $target=$lanmu.'/list'.$i.'.html';
 createhtml($url,$target);
 echo '静态html文件list'.$i.'.html生成成功<br>';
 }
 

function createhtml($sourcePage,$targetPage)	{
		ob_start();
		$str=file_get_contents($sourcePage);  
		$fp=fopen($targetPage,"w") or die("打开文件".$targetPage."出错"); 
		fwrite($fp, $str); 	//将字符串$str写入目标文件中
		ob_end_clean();			//清空缓冲区内容并关闭缓冲区
		//echo '静态html文件生成成功，请打开目录查看';
		fclose($fp);	}


//createhtml("http://localhost/php/schtml/admin/adminnews.php","jb.html");

?> 
