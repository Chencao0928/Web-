<?	$fp=fopen("new.txt","w+");		//�Զ�д��ʽ��new.txt
fwrite($fp,'����д���һ�л�\n\r');
rewind($fp);				//��ָ��ָ���ļ���ͷ
$str=fread($fp,20); 			//��ȡ�ļ���ǰ20���ַ����浽$str��
echo $str;
fclose($fp);			//�ر��ļ���Դ
?>
