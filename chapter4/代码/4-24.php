<?			// $upload_dir���ϴ��ļ���Ŀ¼��getcwd()�ɻ�ȡ��ǰ�ű�����Ŀ¼
$upload_dir = getcwd() . "\\images\\";		// ������ǰĿ¼\images��
if(!is_dir($upload_dir))			// ���Ŀ¼�����ڣ��򴴽�
	mkdir($upload_dir);	
function makefilename() {		// �˺������ڸ��ݵ�ǰʱ�������ϴ��ļ���
	$curtime = getdate();	// ��ȡ��ǰϵͳʱ�䣬�����ļ���
	$filename =$curtime['year'] . $curtime['mon'] . $curtime['mday'] . $curtime['hours'] . $curtime['minutes'] . $curtime['seconds'] . ".jpg";
		return $filename; 		// �������ɵ��ļ���
	}
$newfilename = makefilename();
$newfile = $upload_dir . $newfilename;		//�����ļ�·�������ļ���
if(file_exists($_FILES['upfile']['tmp_name'])) {	//��������ʱ�ļ����ڣ������ϴ��ɹ�
	move_uploaded_file($_FILES['upfile']['tmp_name'], $newfile);
	echo "�ͻ����ļ�����" . $_FILES['upfile']['name'] . "<br>";
	echo "�ļ����ͣ�". $_FILES['upfile']['type']. "<br>";	
	echo "��С��" . $_FILES['upfile']['size'] . "�ֽ�<br>";
	echo "����������ʱ�ļ�����" . $_FILES['upfile']['tmp_name'] . "<br>";
	echo "�ϴ�����ļ�����" . $newfile . "<br>";
	echo '�ļ��ϴ��ɹ� [ <a href="#" onclick="history.go(-1)">�����ϴ�</a> ]
			<p>�������ϴ���ͼƬ�ļ�:</p>
		<img src="images/'.$newfilename .'">';}		//��img�����ʾ�ϴ���ͼƬ
	else 	echo "�ϴ�ʧ��,��������:".$_FILES['upfile']['error'];
?>
