<?	$file=fopen("test.txt","r");	//��ֻ����ʽ��test.txt
while(!feof($file)){			//����ѭ�����ζ�ȡÿһ��
		$str=fgets($file);	//��ȡ�ļ��е�һ�У���ȡ���ָ���ָ����һ��
		echo $str."<br>";	//�����ȡ��һ�У������<br>
}
fclose($file);	//�ر��ļ�	?>
