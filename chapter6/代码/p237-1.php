<? //���ܣ����ƴ��ж༶��Ŀ¼��Ŀ¼
function copyDir($dirSrc, $dirTo) {      
	if(is_file($dirTo)) {               //���Ŀ����һ���ļ����˳�
		echo "Ŀ�겻��Ŀ¼���ܴ���!!";
		return 0;                    //�˳�����
	}
	if(!file_exists($dirTo))           //���Ŀ��Ŀ¼�������򴴽��������򲻱�
		mkdir($dirTo);             //����Ҫ���Ƶ�Ŀ¼
	if($dirh=@opendir($dirSrc)) {           //��Ŀ¼����Ŀ¼��Դ�����ж��Ƿ�ɹ�
		while($filename=readdir($dirh)) {    //����Ŀ¼������Ŀ¼�е��ļ����ļ���
			if($filename!="." && $filename!="..") {     //һ��Ҫ�ų����������Ŀ¼
				$subSrcFile=$dirSrc."/".$filename;     //��ԴĿ¼�Ķ༶��Ŀ¼����
				$subToFile=$dirTo."/".$filename;      //��Ŀ��Ŀ¼�Ķ༶��Ŀ¼����
				if(is_dir($subSrcFile))                    //���Դ�ļ���һ��Ŀ¼
					copyDir($subSrcFile, $subToFile);     //�ݹ�����Լ�������Ŀ¼
				if(is_file($subSrcFile))                   //���Դ�ļ���һ����ͨ�ļ�
					copy($subSrcFile, $subToFile);       //ֱ�Ӹ��Ƶ�Ŀ��λ��
				}			}
			closedir($dirh);       //�ر�Ŀ¼��Դ
		}	}
	copyDir("fnnews10", "D:/admin");   //���ò��Ժ���
?>
