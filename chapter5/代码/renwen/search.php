
<?
$key=$_GET["key"];
$otype=$_GET["otype"];
if ($key=="")
  echo "<script>alert('查找字符串不能为空！');history.back();</Script>";
else {
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>衡阳师范学院人文社会科学系</title>

<style type="text/css">
<!--
body {
	background-color: #CC9900;
	margin:0 auto;
	width:910px;
}
-->
</style></head>
<body><div align="center"><? require('top.html'); ?></div>
<table width="766" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td height="300" valign="top" bgcolor="#F8F5ED"> 
      <table width="97%" height="19" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="19">&nbsp;</td>
        </tr>
      </table>            
	  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E6CF75">
        <? 
require('conn.php');
if ($otype=="title")
$sql="select * from news where title like '%$key%' order by ID desc";
if($otype=="msg")
$sql="select * from news where content like '%$key%' order by ID desc";

$result=$conn->query($sql);
if(!$result)

echo "<p align='center'>对不起，没有找到相关新闻</p>";
else {
?>
        <tr bgcolor="#F1DAB8"> 
          <td width="9%" height="25" align="center">ID</td>
          <td width="55%" align="center">新闻标题</td>
          <td width="15%" align="center">发布者</td>
          <td width="21%" align="center">发布日期</td>
        </tr>
        <?
$i=0;
 while($row=$result->fetch_assoc()){ 
?>
        <tr bgcolor="#FFFFFF"> 
          <td height="22" align="center"><?=$row['ID']?></td>
          <td>　<a href="ONEWS.php?id=<?=$row['ID']?>"  target="_blank"><?=$row['title']?></a></td>
          <td align="center"><?=substr($row['user'],0,12) ?></td>
          <td align="center"><?=notime($row['infotime'])?></td>
        </tr>
        <?
$i++;                                                     
}
?>
        <tr bgcolor="#FFFFFF"> 
          <td height="24" colspan="4"> 
            <div align="center">关键字<font color="#FF0000"><strong><?= $key ?></strong></font>，共为您找到<font color="#FF0000"><?= $i ?></font>条新闻</div></td>
        </tr>
        <?
}}
?>
    </table>
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th scope="col">&nbsp;</th>
        </tr>
      </table></td>
  </tr>
</table>
<div align="center"><? require('bottom.html'); ?></div>
</body>
</html>