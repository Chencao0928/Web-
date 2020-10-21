<? 	$dsn="mysql:host=localhost;dbname=guestbook";
	$db=new PDO($dsn,'root','111');			//连接数据库
	$db->query('set names gb2312'); 			//设置字符集
	
	function Trimtit($tit,$n)	{
if (mb_strlen($tit,'GB2312')>$n) 
			return  mb_substr($tit,0,$n,'GB2312')."…";		   //返回函数值
		else
			return $tit;				     //返回函数值
		}
 function noyear($str)
 {
 return substr($str,5,5); 
 }
 function notime($str)
 {
 return substr($str,0,10);
  } 


?>
