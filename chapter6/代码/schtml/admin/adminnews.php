<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����ϵͳ��̨����</title>
</head>

<body>
<h2 align="center">����ϵͳ��̨����</h2>
<p align="right"><a href="addnews2.php">�������</a></p>
<table width="600" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FF00FF">
<tbody bgcolor="#ffffff">
  <tr>
     <th>ID</th>
    <th>���ű���</th>
   <th>������</th>
    <th>����ʱ��</th>
    <th>����</th>
  </tr>
  <?
	require("conn.php");
	$sql="select * from newscontent order by id desc";
			$rs=mysql_query($sql);
		if(mysql_num_rows($rs)){
			while($row=mysql_fetch_assoc($rs)){ 
 ?>
  <tr>
    <td rowspan="2"><?= $row['id']?></td>
	<!--rs("filepath")�����˾�̬html�ļ���URL��ַ-->
    <td><a href="../list/<?= $row['filepath']?>"><?= $row['title']?></a></td>
	 <td><?= $row['author']?></td>
	  <td><?= $row['time']?></td>
    <td rowspan="2"><a href="editnews.php?id=<?= $row['id']?>">�༭</a> <a href="del.php?id=<?= $row['id']?>">ɾ��</a></td>
  </tr>
  <tr>
       <td colspan="3">���ݣ�<?= $row['content']?> </td>
  </tr>
  <? } }
  else echo '<p>û���ҵ��κ�����</p>';
   ?>
  </tbody>
</table>

</body>
</html>
