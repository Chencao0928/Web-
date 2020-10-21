<? 	require('conn.php'); 
$id=intval($_GET['id']);		//将获取的id强制转换为整型
$sql="Select * from lyb where ID=$id";		//获取待更新的记录
$result=mysql_query($sql,$conn);	
$row=mysql_fetch_assoc($result); 		//将待更新记录各字段的值存入数组中
 ?>
 <h2 align="center">更新留言</h2>
<form method="post" action="edit.php?id=<?= $row['ID'] ?>">
  <table width="400" border="1" align="center" cellpadding="2">
    <tr> <td width="125">留言标题：</td> 
      <td width="275"><input type="text" name="title" value="<?= $row['title'] ?>"> *</td>
    </tr>
    <tr><td>留言人：</td>
      <td><input type="text" name="author" value="<?= $row['author'] ?>"> *</td></tr>
    <tr><td>联系方式：</td>
      <td><input type="text" name="email" value="<?= $row['email'] ?>"> *</td></tr>
    <tr><td>留言内容：</td>
      <td><textarea name="content" cols="30" rows="2"><?= $row['content'] ?></textarea>
</td></tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="确 定"></td></tr>
  </table></form>
