<?
function myReplace($str){
	  $str =str_replace("<","&lt;",$str) ;         //�滻<Ϊ�ַ�ʵ��&lt;
	  $str =str_replace(">","&gt;",$str);         //�滻>Ϊ�ַ�ʵ��&gt;
	  $str =str_replace(chr(13),"<br>",$str);      //�滻�س���Ϊ���б��<br>
	  $str =str_replace(chr(32),"&nbsp;",$str);   //�滻�ո��Ϊ�ַ�ʵ��&nbsp;
		return $str ;                           //���غ���ֵ
}
$str="<font color='red'>abc</font>";		     //�����ַ���
echo $str.'<br>';
echo myReplace($str);		 ?>
