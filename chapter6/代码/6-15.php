<?
if(copy('test.txt','./data/bak.txt'))		//�����ļ�ʾ��
 	echo '�ļ����Ƴɹ�';
else '�ļ�����ʧ�ܣ�Դ�ļ����ܲ�����';

unlink('./test.txt');	//ɾ���ļ�ʾ��

if(file_exists('./data/bak.txt')){		//�ƶ��ļ�ʾ��
if(rename('./data/bak.txt','tang.txt'))
	echo '�ļ��ƶ����������ɹ�';
else echo '�ļ��ƶ�ʧ��';
}
?>

