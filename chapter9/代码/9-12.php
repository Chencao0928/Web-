<?
header("Content-type: text/html; charset=gb2312"); 
$title=unescape($_GET['title']);
echo $title.'<br>';

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