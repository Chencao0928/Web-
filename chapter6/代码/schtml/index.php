<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP���ɾ�̬ҳ��С���� v1.1 - ���ղ���</title>
<META name=keywords content="PHP���ɾ�̬ҳ��С���� v1.1 - ���ղ���">
<meta name="description" content="PHP���ɾ�̬ҳ��С���� v1.1 - ���ղ���">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	require_once("inc/conn.php");
	$sql="select * from newstype";
	$rs=mysql_query($sql);
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="243" valign="top"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="520" valign="top"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/banner.jpg" width="700" height="200" /></td>
      </tr>
    </table>
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" background="images/menu.jpg">
      
      <tr>
        <td width="100" height="38" align="center"><a href="index.php" title="��ҳ" class="menu">��ҳ</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=3" title="�������" class="menu">�������</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=4" title="PHP����Ա" class="menu">PHP����Ա</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=5" title="��վǰ��" class="menu">��վǰ��</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=6" title="�������" class="menu">�������</a></td>
        <td width="100" align="center"><a href="admin/login.php" title="��̨����" target="_blank" class="menu">��̨����</a></td>
      </tr>
    </table>
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="line">
      <tr>
        <td width="624" bgcolor="#FFFFFF">&nbsp;&nbsp;<strong>��&nbsp;&nbsp;������Ѷ</strong></td>
        <td width="126" align="center" bgcolor="#FFFFFF"><a href="http://www.60ie.net/article/5/264.html" target="_blank" title="�������">�������</a></td>
      </tr>
    </table>
      <table width="700" height="100%" border="0" align="center" cellpadding="8" cellspacing="0">
        <tr>
          <td height="470" align="left" valign="top" bgcolor="#FFFFFF">
		  
		  <table width="98%" height="100" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#CCCCCC" style="border-collapse:collapse">
<?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
    <td bgcolor="#FFFFFF"><?php echo $rows["newstype"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
	<?php
		$newstypeid=$rows["newstypeid"];
		$sql="select * from newscontent where newstypeid=$newstypeid limit 0,5";
		$rs1=mysql_query($sql);
		while($rows1=mysql_fetch_assoc($rs1))
		{
		?>
			&nbsp;<a href="newsdetail.php?path=<?php echo $rows1["newspath"]?>" title="<?php echo $rows1["newstitle"] ?>" target="_blank"><?php echo $rows1["newstitle"] ?> </a><br />
		<?php
		}
	?>	</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><a href="typeid.php?typeid=<?php echo $rows["newstypeid"] ?>" target="_blank" title="����">More</a>&nbsp;</td>
  </tr>
  
	<?php
	}
?>
</table>
		  
		  </td>
        </tr>
      </table></td>
    </tr>
</table>
      <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#D1CDCC">
        <tr>
          <td height="10"></td>
        </tr>
      </table>
      <table width="700" height="60" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center">Powered By <a href="http://www.60ie.net" target="_blank"><strong>���ղ���</strong></a> CopyRight 2012- 2014, <strong>���ղ���</strong> xhtml | css</br>
          Processed in <strong>0.781250</strong> second(s) , <strong>4</strong> queries �汾:PHP���ɾ�̬ҳ��С���� v1.1 </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
