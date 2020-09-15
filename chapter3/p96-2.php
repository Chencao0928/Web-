<?
$Patternstr = "黄|黑|走私|发票|枪支|东突";		//定义要过滤的非法字符串集
$Pattern= explode("|",$Patternstr);		//将字符集分割成数组
//print_r($Pattern);
$inputstr="黑色黄色东突枪支弹药走私物品增值发票";	//假设这是用户输入的字符串
for($i=0;$i<count($Pattern);$i++)	{	//分别对数组中每个字符串进行查找
  if (strpos($inputstr, $Pattern[$i])!==false) 	{	//如果找到字符集中的某个字符串
	$outstr=str_replace($Pattern[$i],"",$inputstr);		//将该字符串过滤掉
	$inputstr=$outstr;}		//让输入的字符串等于这次过滤后的字符串，以便进行下次过滤
}
echo $outstr."<br>";		?>
