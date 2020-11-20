<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>新闻系统后台管理</title>
</head>

<body>
<h2 align="center">新闻系统后台管理</h2>
<p align="right"><a href="addnews2.php">添加新闻</a></p>
<table width="600" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FF00FF">
<tbody bgcolor="#ffffff">
  <tr>
     <th>ID</th>
    <th>新闻标题</th>
   <th>发布者</th>
    <th>发布时间</th>
    <th>操作</th>
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
	<!--rs("filepath")保存了静态html文件的URL地址-->
    <td><a href="../list/<?= $row['filepath']?>"><?= $row['title']?></a></td>
	 <td><?= $row['author']?></td>
	  <td><?= $row['time']?></td>
    <td rowspan="2"><a href="editnews.php?id=<?= $row['id']?>">编辑</a> <a href="del.php?id=<?= $row['id']?>">删除</a></td>
  </tr>
  <tr>
       <td colspan="3">内容：<?= $row['content']?> </td>
  </tr>
  <? } }
  else echo '<p>没有找到任何新闻</p>';
   ?>
  </tbody>
</table>

</body>
</html>
