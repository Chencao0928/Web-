<html><body>
	<h2 align="center">��ȡ�����ı��ļ�</h2>
<?
$file=fopen("test.txt","r");	//��ֻ����ʽ��test.txt
$str=fread($file,filesize("test.txt"));		//��ȡ�ļ���ȫ������
echo nl2br($str);		//�������еĻس�ת<br>�����
var_dump(filesize("test.txt"));
fclose($file);			//�ر��ļ�
?>
</body></html>
