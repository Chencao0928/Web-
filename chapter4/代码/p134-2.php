<?	ob_start();
	echo "<b>Hello World</b>";		//����������������������������ҳ��
	$len=ob_get_length();			//$len�����˵�ǰ�����������ݵĳ���
	$out = ob_get_contents();		//$out�����˵�ǰ�������е�����
	ob_end_clean();				//��ղ�����������
	echo $out.'<br>'; 				//���<b>Hello World</b>
	$out = strtolower($out);			//������$out�е��ַ�ת��ΪСд
	var_dump($out,$len);			?>
