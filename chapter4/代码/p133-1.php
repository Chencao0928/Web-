<?	$filename="test.gif";			//ָ���ļ���
	header('Content-Type: image/gif');		//ָ�������ļ�����
	header('Content-Disposition: attachment; filename="'.$filename.'"');	 //�����ļ�������
	header('Content-Length: '.filesize($filename));		//�����ļ��Ĵ�С         
	readfile($filename);			//���ļ����ݶ�ȡ������ֱ��������Ա�����
?>
