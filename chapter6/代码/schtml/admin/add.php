<?	require("conn.php");
	$title=$_POST["title"];	//��ȡ�û��ڱ������������
	$author=$_POST["author"];
	$lanmu=$_POST["lanmu"];
	$content=$_POST["content"];
	$time=date("Y-m-d H:i:s");
		
	$root=$_SERVER['DOCUMENT_ROOT'];	//������ŵ��쾲̬html�ļ���Ŀ¼
	$foldername=date("Y-m-d");
	$folderpath="../list/".$foldername;	//Ŀ¼��ʽ�ǡ�list\2013-07-01��
	if(!file_exists($folderpath))		//����ļ��в�����
			mkdir($folderpath);
		
	$filename=date("H-i-s").".html";	//��ʱ�䴴��html�ļ����ļ���
	$filepath=$folderpath."/".$filename;	//�õ��ļ��������վ��Ŀ¼��URL��·�������ļ�����
		
	if(!file_exists($filepath)){	//��������ɵ��ļ�������
		
		$sql="select html from moban where id=2";	//��moban���ж�ȡģ��ҳ����
		$rs=mysql_query($sql);
		$rows=mysql_fetch_row($rs);
		$moban=$rows[0];	//$moban������ģ��ҳ����
			//echo $moban;
			//$mobanpath="../moban/moban.html";
			//$fp=fopen($mobanpath,"r");   
			//$str=fread($fp,filesize($mobanpath));//����ģ��
			//fclose($fp);
			$moban=str_replace("-lanmu-",$lanmu,$moban);	//�滻ģ��ҳ����Ӧ�ı�ʶ��
			$moban=str_replace("-title-",$title,$moban);
			$moban=str_replace("-time-",$time,$moban);
			$moban=str_replace("-content-",$content,$moban);
			$moban=str_replace("-author-",$author,$moban);
			//���滻���˵�ģ��ҳд���ļ�
			$fp=fopen($filepath,"w");	//����html�ļ�
			fwrite($fp,$moban);			//���滻�õ�ģ��ҳ����д�뵽�ļ���
			fclose($fp);
			$filepath=$foldername."/".$filename;	//�������ɵ�html�ļ���·��
				//���û���������ݲ��뵽���ݱ���
			$sql="insert into newscontent(bigclass,title,content,filepath,author,time) values ('$lanmu','$title','$content','$filepath','$author','$time')";
			if(mysql_query($sql))	//�������ɹ�
				echo "<script>if (confirm('��ӳɹ����Ƿ������ӡ��������  �����ز鿴')){window.location='addnews2.php'}else {window.location='adminnews.php'} </script>";		
			else			
			echo "<script>alert('���ʧ�ܣ�');location.href='adminnews.php';</script>";			
		}
?>