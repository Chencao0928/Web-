<?	function Trimtit($tit,$n)	{	   //ע�⺯��������Ϊ�������Ͳ�ͬ�Ĳ���
if (mb_strlen($tit,'GB2312')>$n) 
			return  mb_substr($tit,0,$n,'GB2312')."��";		   //���غ���ֵ
		else
			return $tit;				     //���غ���ֵ
		}
$str="����ĸ��������2012����ɽ��ػ��Ž�";		     //�����ַ���
$out=Trimtit($str,14) ;		     //���ú���
echo $out; 	     //���������ĸ��������2012����ɡ�
 ?>
