<? session_start();
$fp=fopen("count.txt","r+");
$Visitors=intval(fgets($fp));			//��ȡԭ�з��ʴ���
if(!$_SESSION['connected']){
		$Visitors++;   		 	//�����ʴ�����1
		$_SESSION['connected']=true;	}
rewind($fp);
fwrite($fp,$Visitors);			//���µķ��ʴ���д���ļ�
fclose($fp);
?>
���Ǳ�վ��<?=$Visitors ?>λ�����
