
<?
require('conn.php');
$id=intval($_GET['id']);	


 $sql="update news set hits=hits+1 where id=$id";
 $conn->query($sql);
$sql="select * from news where id=$id";
 $result=$conn->query($sql);
if($result){
 $row=$result->fetch_assoc();
 $title=$row['title'];
 if(!$result)
echo "ID非法，数据库出错";
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?= $title?>——衡阳师范学院人文社会科学系</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.kuang1 {border:1px solid #CC6600;
background:white;
}
.lanmu1 {background:url(images/lanmu.gif) no-repeat;
}
.intro {
background:#eeefdc url(images/intro.gif) no-repeat 0 10px;
padding-left:45px;
font-size:14px;
color:white;

}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
<div align="center"><? require('top.html'); ?></div>
<table id="__01" cellspacing="0" cellpadding="0" width="910" align="center" 
bgcolor="#ffffff" border="0">
  <tbody>
    <tr>
      <td width="210" valign="top" bgcolor="#d8a26b" style="PADDING-RIGHT: 4px; PADDING-LEFT: 1px; PADDING-TOP: 8px"><? require('nav.html'); ?></td>
      <td valign="top" bgcolor="#e8eadd">
	  
	  
	    <table width="97%" border="0" align="center" cellpadding="0" cellspacing="7" bgcolor="#FFFFFF">
          <tr>
            <td height="52" class="intro">系部介绍</td>
          </tr>
	    </table>
		
		  <table width="97%" border="0" align="center" cellpadding="0" cellspacing="7" bgcolor="#FFFFFF">
		  <tr>
		  <td valign="top">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0">
		    <tr>
            <td height="86" align="center" background="images/top.gif"><h2><?= $title ?></h2></td>
          </tr>
          
          <tr>
            <td background="images/midd.gif">&nbsp;</td>
          </tr>
          <tr>
            <td background="images/midd.gif" style="padding:0 22px;"><?= $row['content'] ?></td>
			
          </tr>
		  <tr>
            <td height="27" background="images/bott.gif">&nbsp;</td>
          </tr>
		  </table>
		  </td>
		  </tr>
        </table>
	</td>
    </tr>
  </tbody>
</table>
<div align="center"><? require('bottom.html'); ?></div>
</body>
</html>
<? }}
$result->close();
$conn->close();
 ?>