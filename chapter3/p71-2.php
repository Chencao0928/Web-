<?	$b=10;	
$a="hello ";			//$a��ֵΪhello
$b=&$a;				//����$b����$a�ĵ�ַ
echo $a;				//������Ϊhello
$b="world ";			//�޸�$b��ֵ��$a��ֵ��һ��仯
echo $a;				//������Ϊworld
$a="cup";				//�޸�$a��ֵ��$b��ֵ��һ��仯
echo $b;				//������Ϊcup
?>
