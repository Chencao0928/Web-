<?		// right��������ȡ�ַ���$s�ұߵ�$n���ַ�
function right($s, $n) { return $n? substr($s, -$n): ''; }  
function noHtml($str){ 	// noHTML������ȥ���ַ���$str�е�HTML��Ǵ���
while (strpos($str,'<')!==false || strpos($str,'>')!==false)	  {//����ַ������С�<����>��
	  $begin=strpos($str,'<');			//�ҵ���<������λ��
	  $end=strpos($str,'>'); 				//�ҵ���>������λ��
	  $length=strlen($str)-$end-1; 		//��>�����ұߵ��ַ�������
  			 //����<������ߵ��ַ����͡�>�����ұߵ��ַ���������һ��
	  $filterstr=substr($str,0,$begin) . right($str,$length);     //�ں������ڵ�����һ����
 	$str= $filterstr;	 //��һ�ι��˺���ַ�������ԭ�ַ������Ա�����´ι���
}
return $str;      //���غ���ֵ
}
$str="<font size=9>abc</font>";		     //�����ַ���
echo noHtml($str); 	   				 //������Ϊ��abc��
?>
