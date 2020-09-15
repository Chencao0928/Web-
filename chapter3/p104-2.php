<?
function myReplace($str){
	  $str =str_replace("<","&lt;",$str) ;         //替换<为字符实体&lt;
	  $str =str_replace(">","&gt;",$str);         //替换>为字符实体&gt;
	  $str =str_replace(chr(13),"<br>",$str);      //替换回车符为换行标记<br>
	  $str =str_replace(chr(32),"&nbsp;",$str);   //替换空格符为字符实体&nbsp;
		return $str ;                           //返回函数值
}
$str="<font color='red'>abc</font>";		     //测试字符串
echo $str.'<br>';
echo myReplace($str);		 ?>
