<?	function dirSize($dir) {     	//�Զ���һ������dirSize()��ͳ�ƴ��������Ŀ¼��С
	$dir_size=0;              	//$dir_size����ͳ��Ŀ¼��С
if($dirh=opendir($dir)) {           		//��Ŀ¼�����ж��Ƿ��ܳɹ���
	while($filename=readdir($dirh)) {      		//ѭ������Ŀ¼�µ������ļ�
		if($filename!="." && $filename!="..") {  	//һ��Ҫ�ų����������Ŀ¼
			$subFile=$dir."/".$filename;   	//��Ŀ¼�µ����ļ��͵�ǰĿ¼����
			if(is_dir($subFile))               	//���ΪĿ¼
				$dir_size+=dirSize($subFile);   //�ݹ�ص���������������Ŀ¼�Ĵ�С
			if(is_file($subFile))               	//������ļ�
				$dir_size+=filesize($subFile);  //����ļ��Ĵ�С���ۼ�
				}			}
	closedir($dirh);                    //�ر��ļ���Դ
	return $dir_size;                         //���ؼ�����Ŀ¼��С
		}	}
	$dir_size=dirSize("fnnews");         	//���ú�������Ŀ¼fnnews�Ĵ�С
	echo round($dir_size/pow(1024,1),2)."KB";   	//��Ŀ¼��С�ԡ�KB��Ϊ��λ���
?>
