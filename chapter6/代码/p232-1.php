<?		
if(copy('test.txt','./data/bak.txt'))		//�����ļ�ʾ��
 	echo '�ļ����Ƴɹ�';
else echo '�ļ�����ʧ�ܣ�Դ�ļ����ܲ�����';
	//ɾ���ļ�ʾ��
unlink('./test.txt'); 		//ɾ����ǰ�ļ����µ�test.txt
	//�ƶ��ļ�ʾ��
if(file_exists('./data/bak.txt')){			//�ж�Դ�ļ��Ƿ����
		if(rename('./data/bak.txt','tang.txt')) 		//�ƶ���������Ϊtang.txt
			echo '�ļ��ƶ����������ɹ�';
		else echo '�ļ��ƶ�ʧ��';
}	?>
