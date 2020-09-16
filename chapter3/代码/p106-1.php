<?		// right函数：截取字符串$s右边的$n个字符
function right($s, $n) { return $n? substr($s, -$n): ''; }  
function noHtml($str){ 	// noHTML函数：去除字符串$str中的HTML标记代码
while (strpos($str,'<')!==false || strpos($str,'>')!==false)	  {//如果字符串中有“<”或“>”
	  $begin=strpos($str,'<');			//找到“<”符的位置
	  $end=strpos($str,'>'); 				//找到“>”符的位置
	  $length=strlen($str)-$end-1; 		//“>”符右边的字符串长度
  			 //将“<”符左边的字符串和“>”符右边的字符串连接在一起
	  $filterstr=substr($str,0,$begin) . right($str,$length);     //在函数体内调用另一函数
 	$str= $filterstr;	 //把一次过滤后的字符串赋给原字符串，以便进行下次过滤
}
return $str;      //返回函数值
}
$str="<font size=9>abc</font>";		     //测试字符串
echo noHtml($str); 	   				 //输出结果为“abc”
?>
