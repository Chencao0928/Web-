<? session_start();
$fp=fopen("count.txt","r+");
$Visitors=fgets($fp);			//��ȡԭ�з��ʴ���
if(!$_SESSION['connected']){
		$Visitors++;   		 	//�����ʴ�����1
		$_SESSION['connected']=true;	}
$countlen=strlen($Visitors);	//��ȡ���ʴ��������ֳ���
//���ȡvisitors��ÿ���ֽڣ�Ȼ�󴮳�<img src=?.gif>ͼ�α��
for( $i=0;$i<$countlen;$i++)		 //����������ֶ�Ӧ��imgԪ��
		$num=$num."<img src=img/".substr($Visitors,$i,1) .".gif></img>";
rewind($fp);
fwrite($fp,$Visitors);		//���µķ��ʴ���д���ļ�
fclose($fp);	?>
<h2>��ӭ����PHP������</h2><hr>
���Ǳ�վ��<?=$num ?>λ�����
