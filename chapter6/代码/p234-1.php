<h2 align="center">��ȡ�ļ�����ʾ������</h2>
	<?	$file='tang.txt';
	echo "<br>�ļ�����" .basename($file); 
	//echo "<br>�ļ�����".__FILE__;
	$patharr=pathinfo($file);
	echo "<br>�ļ���չ����".$patharr['extension'];	
	echo "<br>�ļ����ԣ�" . filetype ($file);
	echo "<br>·����". realpath($file); 
	echo "<br>��С��" . filesize ($file);
	echo "<br>�������ڣ�" . date('Y-m-d H:i:s',filectime($file)) ;
	?>
