<?
$conn=new mysqli();
$conn->connect('localhost','root','111');
$conn->select_db('test');	
$conn->query('set names gb2312');
	
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

function unescape($str) {
$str = rawurldecode($str);
preg_match_all("/%u.{4}|&amp;#x.{4};|&amp;#d+;|.+/U",$str,$r);
$ar = $r[0];
foreach($ar as $k=>$v) {
	if(substr($v,0,2) == "%u")
		$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,-4)));
	elseif(substr($v,0,3) == "&amp;#x")
		$ar[$k] = iconv("UCS-2","GBK",pack("H4",substr($v,3,-1)));
	elseif(substr($v,0,2) == "&amp;#")
		$ar[$k] = iconv("UCS-2","GBK",pack("n",substr($v,2,-1)));
}
return join("",$ar);
}
?>
