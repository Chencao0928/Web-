

<SCRIPT>
var currentpos,timer;

function initialize()
{
timer=setInterval("scrollwindow()",50);
}
function sc(){
clearInterval(timer);
}
function scrollwindow()
{
currentpos=document.body.scrollTop;
window.scroll(0,++currentpos);
if (currentpos != document.body.scrollTop)
sc();
}
document.onmousedown=sc
document.ondblclick=initialize
</SCRIPT>
<? require('conn.php');
$id=intval($_GET['id']);	
$sql="select bigclassname from news where ID=$id ";
$result=$conn->query($sql);
$row=$result->fetch_row();
$bcn=$row[0];
 $sql="select ID,title from news where ID <$id and Bigclassname='$bcn' order by ID desc limit 1";
 $result=$conn->query($sql);
 if($result->num_rows==0)
 $pret=0;
 else {
 $row=$result->fetch_assoc();
 $pret=$row['ID'];
 
 $pretit=$row['title'];}
 $sql="select ID,title from news where ID >$id and Bigclassname='$bcn' order by ID limit 1"; 
 $result=$conn->query($sql);
 if(!$result)
 $nextt=0;
 else
 {$row=$result->fetch_assoc();
 $nextt=$row['ID'];
 
 $nexttit=$row['title'];}
 $sql="update news set hits=hits+1 where id=$id";
 $conn->query($sql);
$sql="select * from news where id=$id";
 $result=$conn->query($sql);
 if($result->num_rows>0){
 $row=$result->fetch_assoc();
 $title=$row['title'];
 
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title><?= $title ?></title>

<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.content { font-size: 11pt; }
td{word-break:break-all}
body{
	margin: 0px auto;
	width:910px;
	background:#fbc984 url(images/rwbg.gif) repeat-x;
}
</style>
</head>
<body>
<div align="center"><? require('top.html'); ?></div>
<table width="910" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#EEE9D9">
  <tr>
    <td width="764" height="40" align="right" bgcolor="#F8F5ED"> 
      <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="57"><div align="center">
            <table width="760" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2">
					<? 	if($nextt<>0){ 		//如果有下一条记录		?>
					<a title="<?= $nexttit ?>" style="float:right;padding-right:16px;" href="onews.php?id=<?= $nextt ?>">下一条 &gt;&gt;</a>
				      <? }
					  
					  	if($pret<>0) { ?>
					
					<a title="<?= $pretit ?>" style="float:right;padding-right:16px;" href="onews.php?id=<?= $pret ?>">&lt;&lt; 上一条 </a>
					<? } ?>
					当前位置：<a href="index.asp">首页</a> &gt; <a href="otype.php?owen1=<?= $bcn ?>"><?= $bcn ?></a> 
                      
					</td>
                  </tr>
				  <tr>
                    <td height="18" colspan="2" align="center"><h2><?= $title ?></h2></td>
                  </tr>
				  
				   <tr>
                    <td height="18" colspan="2" align="center"> 
					</td>
                  </tr>
				  
                  <tr>
                    <td width="40%" height="30">双击自动滚屏</td>
                    <td width="60%" align="center">发布者：<?= $row['user'] ?> 发布时间：<?= notime($row['infotime'])?> 阅读：<font color="#FFCC00"><?= $row['hits'] ?></font> 次</td>
                  </tr>
                  <tr>
                    <td colspan="2"><div style='font-size:10.5pt'>
                      <hr width="700" size="1" color=CCCC99>
                      <?= $row['content'] ?></div></td>
                  </tr>
                  <tr align="right">
                    <td colspan="2"><hr width="700" size="1" color=CCCC99></td>
                  </tr>
                  <? 
		$result->close();
		}	
		$conn->close();
			
			   ?>
                </table></td>
              </tr>
            </table>
          </div></td>
        </tr>
      </table>
      <table width="86%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="27" align="right"> <img src="images/printer.gif" width="16" height="14" align="absmiddle"> 
            <a href="javascript:window.print()">打印本页</a> | <img src="images/close.gif" width="14" height="14" align="absmiddle"> 
            <a href="javascript:window.close()">关闭窗口</a></td>
        </tr>
    </table>    </td>
  </tr>
</table>
<div align="center"><? require('bottom.html'); ?></div>
</body>
</html>