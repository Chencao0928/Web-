<?	$fp=fopen("count.txt","r+");
		$Visitors=intval(fgets($fp));			//��ȡ�ļ��е�����
		$Visitors++;   		 	//����������1
		rewind($fp);				 //���ļ�ָ��ָ��ͷ���Ա�����д
		fwrite($fp,$Visitors);		//��������ֵд��count.txt�ļ�֮��
		fclose($fp);	?>
<html><body>
		<h2>��ӭ����PHP������</h2><hr>
		���Ǳ�վ��<?=$Visitors ?>λ�����
</body></html>
