<?php
	ob_start();
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP生成静态页面小程序 v1.1 - 夏日博客</title>
<META name=keywords content="PHP生成静态页面小程序 v1.1 - 夏日博客">
<meta name="description" content="PHP生成静态页面小程序 v1.1 - 夏日博客">
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
        <td width="100" height="38" align="center"><a href="index.php" title="首页" class="menu">首页</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=3" title="网络随笔" class="menu">网络随笔</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=4" title="PHP程序员" class="menu">PHP程序员</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=5" title="网站前端" class="menu">网站前端</a></td>
        <td width="100" align="center"><a href="typeid.php?typeid=6" title="经验分享" class="menu">经验分享</a></td>
        <td width="100" align="center"><a href="admin/login.php" title="后台管理" target="_blank" class="menu">后台管理</a></td>
      </tr>
    </table>
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="line">
      <tr>
        <td width="624" bgcolor="#FFFFFF">&nbsp;&nbsp;<strong>●&nbsp;&nbsp;新闻资讯</strong></td>
        <td width="126" align="center" bgcolor="#FFFFFF"><a href="http://www.60ie.net/article/5/264.html" target="_blank" title="程序帮助">程序帮助</a></td>
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
    <td align="right" bgcolor="#FFFFFF"><a href="typeid.php?typeid=<?php echo $rows["newstypeid"] ?>" target="_blank" title="更多">More</a>&nbsp;</td>
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
          <td align="center">Powered By <a href="http://www.60ie.net" target="_blank"><strong>夏日博客</strong></a> CopyRight 2012- 2014, <strong>夏日博客</strong> xhtml | css</br>
          Processed in <strong>0.781250</strong> second(s) , <strong>4</strong> queries 版本:PHP生成静态页面小程序 v1.1 </td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
