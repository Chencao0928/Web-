
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP���ɾ�̬ҳ��С���� v1.1 - ���ղ���</title>
<link rel="stylesheet" href="Style.css" type="text/css">
</head>
<body>
<? require("conn.php"); 
	$id=$_GET["id"];
	if($_POST["Submit"])	//����������ύ��ť
	{
		$title=$_POST["title"];		//��ȡ�û����������
		$author=$_POST["author"];
		$lanmu=$_POST["lanmu"];
		$content=$_POST["content"];
		$path=$_POST["path"];
		$time=$_POST["time"];
		
		$root=$_SERVER['DOCUMENT_ROOT'];
		$filepath="../list/$path";
		if(file_exists($filepath))		//�����̬htmlҳ�����
		{
			$sql="select html from moban where id=2";
			$rs=mysql_query($sql);
			$rows=mysql_fetch_row($rs);
			$moban=$rows[0];	//��ȡģ��ҳ
			
			$moban=str_replace("-lanmu-",$lanmu,$moban);	//�滻ģ��ҳ�ж�Ӧ�ַ���
			$moban=str_replace("-title-",$title,$moban);
			$moban=str_replace("-time-",$time,$moban);
			$moban=str_replace("-content-",$content,$moban);
			$moban=str_replace("-author-",$author,$moban);
			$fp=fopen($filepath,"w");
			fwrite($fp,$moban);		//������ģ��ҳ���ɵ�html����д�뵽�ļ���
			fclose($fp);
		}
			//�޸����ݱ��ж�Ӧ�ļ�¼
		$sql="update newscontent set title='$title',content='$content',author='$author',bigclass='$lanmu' where id=$id";
		if(mysql_query($sql))
			echo "<script language=javascript>alert('�޸ĳɹ���');location.href='adminnews.php'</script>";
	
		else	echo "<script language=javascript>alert('�޸�ʧ�ܣ�');location.href='adminnews.php'</script>";	
		die();	//�˳�����
	}
	$sql="select * from newscontent where id=$id";	//��ȡid��Ӧ�ļ�¼
	$rs=mysql_query($sql);
	$row=mysql_fetch_assoc($rs);	//����������¼��ʾ�ڱ���
?>
<h3 align="center">�����޸�ҳ��</h3>
<form method="post" action="?id=<?= $row['id'] ?>"><!--�ύ��������URL�ַ���-->
  <table width="480" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tbody bgcolor="#ffffff">
    <tr>
      <td width="125">���ű��⣺</td>
      <td width="375"><input type="text" name="title" size="30" value=<?= $row['title'] ?>></td>
    </tr>
    <tr>
      <td>�����ߣ�</td>
      <td><input type="text" name="author" value=<?= $row['author'] ?>></td>
    </tr>
    <tr>
      <td>������Ŀ��</td>
      <td><input type="text" name="lanmu" value=<?= $row['bigclass'] ?>></td>
    </tr>
    <tr>
      <td>�������ݣ�</td>
      <td><textarea name="content" cols="30" rows="3"><?= $row['content'] ?></textarea></td>
    </tr>
	 <tr>
      <td><input name="time" type="hidden" value="<?= $row['time'] ?>">   
<input name="path" type="hidden" value="<?= $row['filepath'] ?>"></td>
      <td><input name="Submit" type="submit" value="�� ��"> </td>
    </tr>
	</tbody>
  </table>
</form> 
</body>
</html>
