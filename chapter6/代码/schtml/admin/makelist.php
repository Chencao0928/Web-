<?	$lanmu=$_GET["lanmu"];		//��ȡ��Ŀ��
$lanmu='�������';
$conn=mysql_connect("localhost","root","111");
mysql_query("set names 'gb2312'");
mysql_select_db("guestbook",$conn);
//if(isset($_GET['page']) && (int)$_GET['page']>0)			 //��ȡҳ��
//	$Page=$_GET['page'];
//else
//	$Page=1;
	
	$PageSize=4; 		
$result=mysql_query("Select * from lyb",$conn); 		//������Ŀ�����������
$RecordCount=mysql_num_rows($result);
//mysql_free_result($result);

	//�����ж���ҳ

 $PageCount =ceil($RecordCount/$PageSize);
  if(!file_exists($lanmu))		//�����Ŀ¼������
			mkdir($lanmu); 	//������Ŀ¼
 for($i=1;$i<=$PageCount;$i++){
 $url='http://localhost/php/8/example/8.1/5-10.php?page='.$i;


 $target=$lanmu.'/list'.$i.'.html';
 createhtml($url,$target);
 echo '��̬html�ļ�list'.$i.'.html���ɳɹ�<br>';
 }
 

function createhtml($sourcePage,$targetPage)	{
		ob_start();
		$str=file_get_contents($sourcePage);  
		$fp=fopen($targetPage,"w") or die("���ļ�".$targetPage."����"); 
		fwrite($fp, $str); 	//���ַ���$strд��Ŀ���ļ���
		ob_end_clean();			//��ջ��������ݲ��رջ�����
		//echo '��̬html�ļ����ɳɹ������Ŀ¼�鿴';
		fclose($fp);	}


//createhtml("http://localhost/php/schtml/admin/adminnews.php","jb.html");

?> 
