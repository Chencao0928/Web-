<? 	$dsn="mysql:host=localhost;dbname=guestbook";
	$db=new PDO($dsn,'root','111');			//�������ݿ�
	$db->query('set names gb2312'); 			//�����ַ���
	
	function Trimtit($tit,$n)	{
if (mb_strlen($tit,'GB2312')>$n) 
			return  mb_substr($tit,0,$n,'GB2312')."��";		   //���غ���ֵ
		else
			return $tit;				     //���غ���ֵ
		}
 function noyear($str)
 {
 return substr($str,5,5); 
 }
 function notime($str)
 {
 return substr($str,0,10);
  } 


?>
