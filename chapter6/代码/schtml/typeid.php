<?php
	ob_start();
	session_start();
	require_once("inc/conn.php");
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
        <td width="624" bgcolor="#FFFFFF" class="w_font">&nbsp;&nbsp;<strong>��&nbsp;&nbsp;������Ѷ</strong></td>
        <td width="126" align="center" bgcolor="#FFFFFF" class="w_font"><a href="http://www.60ie.net/article/5/264.html" target="_blank" title="�������">�������</a></td>
      </tr>
    </table>
      <table width="700" height="100%" border="0" align="center" cellpadding="8" cellspacing="0">
        <tr>
          <td height="470" align="left" valign="top" bgcolor="#FFFFFF">
		  
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="10"></td>
                  </tr>
                </table>
		<?php
	if($id=="")
	{
		$id=1;
	}
	$pagesize=3;
	$sql="select * from newscontent where newstypeid='".intval($_GET["typeid"])."' order by newstypeid desc";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from newscontent where newstypeid='".intval($_GET["typeid"])."' order by newstypeid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="100%" border="0" align="center">

<?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
	  <td width="20" height="20" align="center" background="images/line.gif" class="bline"><img src="images/Zx_arrow.jpg" width="7" height="7" /></td>
	  <td align="left" background="images/line.gif"><a href="newsdetail.php?path=<?php echo $rows["newspath"]?>" title="<?php echo $rows["newstitle"] ?>" target="_blank"><?php echo $rows["newstitle"] ?> </a>&nbsp;</td>
	  <td width="145" align="center" background="images/line.gif">&nbsp;&nbsp; <?php echo $rows["newstime"]?></td>
	</tr>
	
	
	<?php
	}
?>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000">
<tr>
<td height="35" align="right">
<?php
	if($pageno==1)
	{
	?>
	��ҳ | ��һҳ | <a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=1">��ҳ</a> | <a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
	<?php
	}
	else
	{
	?>
	<a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=1">��ҳ</a> | <a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="typeid.php?cid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="typeid.php?typeid=<?php echo intval($_GET["typeid"]) ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
	<?php
	}
?>
	&nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ</td>
<td>
<form action="" method="get" style="margin:0px;">
ת����
<input type="text" name="pageno" size="3" value="<?php echo $pageno?>" />
<input type="hidden" name="id" value="<?php echo $id?>" />
<input type="submit" class="button" value="go" />
</form></td>
</tr>
</table></td>
                </tr>
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
