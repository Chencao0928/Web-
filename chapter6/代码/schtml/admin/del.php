
<?  require("conn.php"); 
	$id=$_GET["id"];
	$sql="select * from newscontent where id=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$path=$rows["filepath"];	//�ҵ���ɾ�����Ŷ�Ӧ�ľ�̬html�ļ���url
	$root=$_SERVER['DOCUMENT_ROOT'];
	$filepath="../list/".$path;
	if(file_exists($filepath))
			unlink($filepath);	//ɾ����̬html�ļ�
	
	$path=substr($path,0,10);	//�ҵ�Ϊ��ž�̬html�ļ���������Ŀ¼
	$folderpath="../list/$path";
	$folder=opendir($folderpath);	//�򿪸�Ŀ¼
	$n=0;
	while($f=readdir($folder))	{
		if($f<>"."&&$f<>"..")	//���Ŀ¼�л��������ļ�
			$n++;
	}
	closedir();
	if($n==0)	//Ŀ¼���Ѿ�û���κ��ļ�
		rmdir($folderpath);	//ɾ����Ŀ¼
	$sql="delete from newscontent where id=$id";	//ɾ�����ݱ��еļ�¼
	
	if(mysql_query($sql))
		echo "<script language=javascript>alert('ɾ���ɹ���');window.location='adminnews.php'</script>";
	else
		echo "<script language=javascript>alert('��������');window.location='adminnews.php'</script>";
?>

