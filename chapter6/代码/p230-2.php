<?	file_put_contents('news.txt','��һ��');		//д���ַ���
		$data='Ҫд�������';
		$num=file_put_contents('news.txt',$data,FILE_APPEND);		//׷�ӷ�ʽд��
		echo $num; 			//����д����ֽ���	?>
