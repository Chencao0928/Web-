<?php require_once('admincheck.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP���ɾ�̬ҳ��С���� v1.1 - ���ղ���</title>
<link rel="stylesheet" href="Style.css" type="text/css">
<script language="javascript">
	//DOM��
	function checkform()
	{
		if(document.forms["frm"].elements["title"].value=="")
		{
			alert("���ű��ⲻ��Ϊ��");
			document.forms["frm"].elements["title"].focus();
			return false;
		}
		
		if (eWebEditor1.getHTML()==""){
			alert("�������ݲ���Ϊ�գ�");
			return false;
		}
		if(document.forms["frm"].elements["source"].value=="")
		{
			alert("������Դ����Ϊ��");
			document.forms["frm"].elements["source"].focus();
			return false;
		}
		return true;
	}
</script>
</head>

<body>
<?php
	if($_POST["Submit"])
	{
		$typeid=$_POST["typ"];
		$title=$_POST["title"];
		$source=$_POST["source"];
		$time=date("Y-m-d H:i:s");
		$content=$_POST["d_content"];
		$root=$_SERVER['DOCUMENT_ROOT'];
		$foldername=date("Y-m-d");
		$folderpath="../newslist/".$foldername;
		if(!file_exists($folderpath))
		{
			mkdir($folderpath);
		}
		$filename=date("H-i-s").".html";
		$filepath=$folderpath."/".$filename;
		if(!file_exists($filepath))
		{
			$sql="select * from newstype where newstypeid=$typeid";
			$rs=mysql_query($sql);
			$rows=mysql_fetch_assoc($rs);
			$type=$rows["newstype"];
			$mobanpath="../moban/moban.html";
			$fp=fopen($mobanpath,"r");   
			$str=fread($fp,filesize($mobanpath));//����ģ��
			fclose($fp);
			$str=str_replace("{-type-}",$type,$str);
			$str=str_replace("-title-",$title,$str);
			$str=str_replace("-time-",$time,$str);
			$str=str_replace("-content-",$content,$str);
			$str=str_replace("-source-",$source,$str);
			//���滻�õ�����д���ļ�
			$fp=fopen($filepath,"w");
			fwrite($fp,$str);
			fclose($fp);
			$filepath=$foldername."/".$filename;
			$sql="insert into newscontent(newstypeid,newstitle,content,newspath,newssource,newstime) values ($typeid,'$title','$content','$filepath','$source','$time')";
			if(mysql_query($sql))
			{
			?>
			<script>if (confirm('��ӳɹ����Ƿ������ӣ�\n\n���������  �����ز鿴')){window.location='addnews.php'}else {window.location='admin.php'} </script>
			<?php
			}
			else
			{
			?>
			<script>if (confirm('���ʧ�ܣ��Ƿ������ӣ�\n\n���������  �����ز鿴')){window.location='addnews.php'}else {window.location='admin.php'} </script>
			<?php
			}
		}
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" onsubmit="return checkform()">
  <table width="100%" border="0" align="center" cellspacing="1" class="tableBorder">
    <tr>
      <th height="25" colspan="2" align="center">�������</th>
    </tr>
    <tr>
      <td width="355" height="25" align="right" class="forumRowHighlight">���ű���:</td>
      <td width="919" align="left" class="forumRowHighlight"><label>
        <input name="title" type="text" id="title" size="45" />
      </label></td>
    </tr>
    <tr>
      <td height="25" align="right" class="forumRowHighlight">�������:</td>
      <td align="left" class="forumRowHighlight"><label>
	  	<?php
			$sql="select * from newstype";
			$rs=mysql_query($sql);
		?>
        <select name="typ" id="typ">
		<?php
			while($rows=mysql_fetch_assoc($rs))
			{
			?>
			<option value="<?php echo $rows["newstypeid"]?>"><?php echo $rows["newstype"]?></option>
			<?php
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td align="right" class="forumRowHighlight">��������:</td>
      <td align="left" class="forumRowHighlight"><textarea name="d_content" style="display:none;"></textarea>
<iframe ID="eWebEditor1" src="../ewebeditor/ewebeditor.htm?id=d_content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="forumRowHighlight"></td>
    </tr>
    <tr>
      <td height="25" align="right" class="forumRowHighlight">������Դ:</td>
      <td align="left" class="forumRowHighlight"><label>
        <input name="source" type="text" id="source" value="���ղ���" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="forumRowHighlight"><label>
      <input type="submit" name="Submit" value="�ύ" />
      </label>
        <label>
        <input type="reset" name="Submit2" value="����" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
