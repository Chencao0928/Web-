<?	function Trimtit($tit,$n)	{	   //注意函数的输入为两个类型不同的参数
if (mb_strlen($tit,'GB2312')>$n) 
			return  mb_substr($tit,0,$n,'GB2312')."…";		   //返回函数值
		else
			return $tit;				     //返回函数值
		}
$str="航空母舰辽宁舰2012年完成舰载机着舰";		     //测试字符串
$out=Trimtit($str,14) ;		     //调用函数
echo $out; 	     //输出：航空母舰辽宁舰2012年完成…
 ?>
