<?	$email="tangsix@163.com";		
if (strpos($email, "@") && strpos($email, ".")&& strpos($email, "@")<strpos($email, "."))
echo "Email��ʽ��ȷ<br/>";
	//�ж�IP��ַ�Ƿ���ȷ���õ���explode����
$IP="59.51.24.54";
$arr=explode(".",$IP);
if (count($arr)==4) 
echo "IP��ʽ��ȷ��IPǰ��λΪ $arr[0].$arr[1].*.*";	?>
