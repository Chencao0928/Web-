<?      //���ܣ��õݹ�ķ���ɾ���ǿյ�Ŀ¼$dir
function delDir($dir) {   
if(file_exists($dir)) {      	//�ж�Ŀ¼�Ƿ����
	if($dirh=opendir($dir)) {      	//��Ŀ¼����Ŀ¼��Դ$dirh
		while($filename=readdir($dirh)) {  //����Ŀ¼������Ŀ¼�е��ļ����ļ���
			if($filename!="." && $filename!="..") {   	//һ��Ҫ�ų����������Ŀ¼
				$subFile=$dir."/".$filename;   	//��Ŀ¼�µ��ļ��͵�ǰĿ¼����
				if(is_dir($subFile))           	//�����Ŀ¼
					delDir($subFile);          //�ݹ��������ɾ����Ŀ¼
				if(is_file($subFile))            //������ļ�
					unlink($subFile);          //ֱ��ɾ������ļ�
					}	}
				closedir($dirh);                       	//�ر�Ŀ¼��Դ
				rmdir($dir);                          	//ɾ����Ŀ¼
			}		}	}
	delDir("fnnews10");  //����delDir()����������ǰĿ¼�е�fnnews�ļ���ɾ��
	?>
