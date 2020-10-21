
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>网页设计学习网留言板</title>
<style type="text/css">
<!--
#main {
margin:8px auto;
width:480px;
border:1px solid red;

padding:8px;

}
#main h3 {
text-align:center;
border-bottom:1px dashed gray;
background:#99FFFF;
}
#main p {
font:12px/1.6 "宋体";
margin:2px;
}
input{font-size:12px;}
-->
</style>
</head>

<body>
<h1 style="font-size:16px; margin:4px;" align="center">网页设计学习网留言板</h1>

<p style="margin:8px auto;width:480px;
text-align:right;">
<? require('conn.php');
$result=$db->query("select * from lyb order by ID desc");

echo '共有'.$result->rowCount().'条留言';
//rs.pagesize=4

?>
 <a href="7-18se.asp">搜索留言</a>&nbsp; <a href="login.htm">管理留言</a></p>
 <? //echo $_SERVER['SERVER_NAME'];
if ($result->rowCount()>0){
 while($row=$result->fetch(1)){ 
?>

<div id="main"><img src="images/<?= $row["sex"]?>.gif" style="float:left;"/><h3><?= $row["title"] ?></h3><p>作者：<?= $row["author"] ?> </p>
      <p>内容：<?= $row["content"]?> </p>
    <p align="right">发表时间：<?= $row["date"]?> 来自：<?= $row["ip"]?> </p>
 
 </div>
<? }
}

else echo "<p>目前还没有用户留言</p>";


 ?>
 <h2 align="center">请您在下面填写留言</h2>
<form name="form1" method="post" action="submit.php">
  <table width="480" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tbody bgcolor="#ffffff">
    <tr>
      <td width="125">留言主题：</td>
      <td width="475"><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>留言人：</td>
      <td><input type="text" name="author"> 性别：男
        <input type="radio" name="sex" value="2" />
        女：<input type="radio" name="sex" value="1" /></td>
    </tr>
    <tr>
      <td>联系方式：</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>留言内容：</td>
      <td><textarea name="content" cols="30" rows="2"></textarea></td>
    </tr>
	 <tr>
      <td></td>
      <td>&nbsp;<input type="submit" name="Submit" value="提 交"></td>
    </tr>
	</tbody>
  </table>
</form>
</body>
</html>
