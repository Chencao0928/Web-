	<?	
	if(!file_exists('temp')) mkdir('temp');		//�ڵ�ǰĿ¼�´���tempĿ¼
	else echo '��Ŀ¼�Ѵ��ڣ����ܴ���<br>';
	if(file_exists('data')) rmdir('data');		//�ڵ�ǰĿ¼��ɾ��dataĿ¼
	else echo '��Ŀ¼�����ڣ�����ɾ��<br>';	
	echo getcwd();			//�����ǰ����Ŀ¼
	chdir('../');			//ת����һ��Ŀ¼
	echo getcwd();			//�������ǰ����Ŀ¼		?>
