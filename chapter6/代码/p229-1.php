<?	$fp=fopen("new.txt","w");		//��д�뷽ʽ��new.txt
		fwrite($fp,'����д���һ�л�\n');
		fwrite($fp,'���д��12���ַ�\n',12);
		fclose($fp);			//�ر��ļ���Դ
?>
