
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>��ҳ���ѧϰ�����԰�</title>
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
font:12px/1.6 "����";
margin:2px;
}
input{font-size:12px;}
-->
</style>
</head>

<body>
<h1 style="font-size:16px; margin:4px;" align="center">��ҳ���ѧϰ�����԰�</h1>

<p style="margin:8px auto;width:480px;
text-align:right;">
<? require('conn.php');
$result=$db->query("select * from lyb order by ID desc");

echo '����'.$result->rowCount().'������';
//rs.pagesize=4

?>
 <a href="7-18se.asp">��������</a>&nbsp; <a href="login.htm">��������</a></p>
 <? //echo $_SERVER['SERVER_NAME'];
if ($result->rowCount()>0){
 while($row=$result->fetch(1)){ 
?>

<div id="main"><img src="images/<?= $row["sex"]?>.gif" style="float:left;"/><h3><?= $row["title"] ?></h3><p>���ߣ�<?= $row["author"] ?> </p>
      <p>���ݣ�<?= $row["content"]?> </p>
    <p align="right">����ʱ�䣺<?= $row["date"]?> ���ԣ�<?= $row["ip"]?> </p>
 
 </div>
<? }
}

else echo "<p>Ŀǰ��û���û�����</p>";


 ?>
 <h2 align="center">������������д����</h2>
<form name="form1" method="post" action="submit.php">
  <table width="480" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tbody bgcolor="#ffffff">
    <tr>
      <td width="125">�������⣺</td>
      <td width="475"><input type="text" name="title"></td>
    </tr>
    <tr>
      <td>�����ˣ�</td>
      <td><input type="text" name="author"> �Ա���
        <input type="radio" name="sex" value="2" />
        Ů��<input type="radio" name="sex" value="1" /></td>
    </tr>
    <tr>
      <td>��ϵ��ʽ��</td>
      <td><input type="text" name="email"></td>
    </tr>
    <tr>
      <td>�������ݣ�</td>
      <td><textarea name="content" cols="30" rows="2"></textarea></td>
    </tr>
	 <tr>
      <td></td>
      <td>&nbsp;<input type="submit" name="Submit" value="�� ��"></td>
    </tr>
	</tbody>
  </table>
</form>
</body>
</html>
