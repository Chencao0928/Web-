<?
$Patternstr = "��|��|��˽|��Ʊ|ǹ֧|��ͻ";		//����Ҫ���˵ķǷ��ַ�����
$Pattern= explode("|",$Patternstr);		//���ַ����ָ������
//print_r($Pattern);
$inputstr="��ɫ��ɫ��ͻǹ֧��ҩ��˽��Ʒ��ֵ��Ʊ";	//���������û�������ַ���
for($i=0;$i<count($Pattern);$i++)	{	//�ֱ��������ÿ���ַ������в���
  if (strpos($inputstr, $Pattern[$i])!==false) 	{	//����ҵ��ַ����е�ĳ���ַ���
	$outstr=str_replace($Pattern[$i],"",$inputstr);		//�����ַ������˵�
	$inputstr=$outstr;}		//��������ַ���������ι��˺���ַ������Ա�����´ι���
}
echo $outstr."<br>";		?>
