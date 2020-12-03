<?
header("Content-type: text/html; charset=gb2312"); 
$user=unescape($_GET['user']);
$comment=unescape($_GET['comment']);
echo "<h3>评论人：".$user."</h3>";
echo "<p>内容：".$comment."</p>";

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



