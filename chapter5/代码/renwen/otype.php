
<? 
$owen1=$_GET["owen1"];
$owen2=$_GET["owen2"];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>衡阳师范学院人文社会科学系--<?=$owen1 ?></title>
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
.biaoti {font-size: 14px;
line-height:180%;
padding:0 22px;
background:url(images/bullet2.gif) no-repeat 4px 2px;
}
body{
	margin: 0px auto;
	width:910px;
	background:#fbc984 url(images/rwbg.gif) repeat-x;
}
-->
</style>


</head>
<body><? require('top.html'); ?>
<table width="910" height="204" border="0"  cellpadding="0" cellspacing="0">
  <tr>
    <th width="171" valign="top" bgcolor="#F8F5ED" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="25" align="center" bgcolor="#E8D7B3" ><strong><font color="#FFFFFF">新 闻 搜 索</font></strong></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <form name="form1" method="get" action="search.php">
              <tr>
                <td height="30" align="center" bgcolor="#F8F5ED">
                  <input name="key" type="text" class="input" id="key" size="19">                </td>
              </tr>
              <tr>
                <td height="30" align="center" bgcolor="#F8F5ED">
                  <select name="otype" class="input">
                    <option value="title" selected class="input">新闻标题</option>
                    <option value="msg" class="input">新闻内容</option>
                  </select>
              　
              <input type="submit" name="Submit2" value="搜索" class="input"></td>
              </tr>
            </form>
        </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="25" align="center" bgcolor="#E8D7B3" ><a  href="otype.php?owen1=<?=$owen1 ?>"><strong><font color="#FFFFFF"><?=$owen1 ?></font></strong></a></td>
        </tr>
        <?
		require('conn.php');

$result=$conn->query("Select * From SmallClass Where BigClassName='$owen1'");
if ($result->num_rows>0){
 while($row=$result->fetch_assoc()){ 
?>
        <tr bgColor=#EFEFEF>
          <td height="25" align="center" bgcolor="#EFEAD8" ><a  href="otype.php?owen1=<?=$owen1 ?>&owen2=<?= $row["SmallClassName"] ?>"><font color="#B39862"><b><?= $row["SmallClassName"] ?></b></font></a></td>
        </tr>
        <?
}}
$result->close();
?>
      </table></th>
    <th width="693" bgcolor="#F8F5ED" scope="col"><table width="95%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5"> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="5"> </td>
      </tr>
    </table>
      <table width="95%" border="0" cellpadding="0" cellspacing="0">
        <? 
$page=intval($_REQUEST['page']);		 

if($owen1<>"" && $owen2 <>"")
$sql="select * from news where BigClassName='$owen1' and SmallClassName='$owen2' order by ID desc";

else if ($owen1<>"")
$sql="select * from news where BigClassName='$owen1' order by ID desc";
$result=$conn->query($sql);
//var_dump($result);
$RecordCount=$result->num_rows;
if (!$result)
echo "暂时没有记录";
else {
?>
        <tr bgcolor="#F8F5ED">
          <td height="25" colspan="2" align="left"> &nbsp;&nbsp;<img src="images/bullet2.gif" width="15" height="14">&nbsp;&nbsp; <a  href="otype.php?owen1=<?=$owen1 ?>" style="font-size:18px;color:#990000"><?=$owen1 ?></a> </td>
        </tr>
        <tr>
          <td height="14" colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="19"><hr color="CCCC99" size="1"></td>
              </tr>
          </table></td>
        </tr>
        <? 
		
$PageSize=12;
if ($page==0) $page=1;
$PageCount =ceil($RecordCount/$PageSize);
$pages=$PageCount;
if ($page>$pages) $page=$pages;
$result->data_seek(($page-1)*$PageSize); 

for($i=0;$i<$PageSize;$i++){ 
$row=$result->fetch_assoc(); 
			 if($row){	

?>
        <tr>
          <td width="6%" height="24" align="center" ><img src="images/+.gif" width="15" height="15"></td>
          <td height="28" align="left" >
            <? 
			
			
			if ($row["imagenum"]<>0) 
			 echo "<img src='images/news.gif' border=0 alt='图片新闻'>" ?>
          <a href="onews.php?id=<?=$row['ID']?>" target="_blank" style="font-size:14px; font-weight:normal;"><?= trimtit($row['title'],28) ?></a>　<font color="#999999">[<?= notime($row['infotime'])?>] (阅读<font color="#ff0000"><?=$row['hits']?></font>次) </font></td>
        </tr>
        <?
}}
?>
        <tr valign="bottom">
          <td height="25" colspan="2" align="center" ><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="19"><hr color="CCCC99" size="1"></td>
              </tr>
          </table></td>
        </tr>
        <tr valign="bottom">
          <td height="25" colspan="2" align="center" ><form method="Post" action="otype.php?owen1=<?=$owen1 ?>&owen2=<?=$owen2 ?>">
              <?  if ($page==1)      
    echo "首页 上一页&nbsp;";
  else{
    echo "<a href=otype.php?owen1=". $owen1."&owen2=". $owen2 ."&page=1>首页</a> &nbsp; ";
    echo "<a href=otype.php?owen1=". $owen1."&owen2=". $owen2 ."&page=".($page-1).">上一页</a>  ";
}
  if  ($page==$PageCount) 
    echo "下一页 尾页";
  else{
    echo "<a href=otype.php?owen1=". $owen1."&owen2=". $owen2 ."&page=".($page+1).">下一页</a>  ";
    echo "<a href=otype.php?owen1=". $owen1."&owen2=". $owen2 ."&page=".$PageCount.">末页</a>  ";
 }
   echo "页次：<strong><font color=red>". $page ." </font>/ $PageCount </strong>页 ";
    echo "&nbsp;共<b><font color='#FF0000'> $RecordCount </font></b>条记录 <b> $PageCount </b>条记录/页";
   echo " 转到：<input type='text' name='page' size=4 maxlength=10 class=input value='$page'>";
   echo " <input class=input type='submit'  value=' Goto '  name='cndok'></span></p>" ;    
?>
          </form></td>
        </tr>
        <? 
}
$result->close();
$conn->close();
?>
    </table></th>
  </tr>
</table>
<? require('bottom.html'); ?>
</body>
</html>