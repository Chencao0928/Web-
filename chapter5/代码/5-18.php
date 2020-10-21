<?  //注意：运行该程序需要在文件名后加参数,例如：5-18.php?id=6

 	$conn=new mysqli();
	$conn->connect('localhost','root','111');
	$conn->select_db('lyb');
	$conn->query('set names gb2312');
	$id=intval($_GET['id']);		//将获取的id强制转换为整型
	//执行2条SQL语句，2条SQL语句之间用“;”号隔开
$conn->multi_query("Select * from lyb where ID=$id; Select distinct class from lyb");
$result=$conn->store_result();		//获取第1个结果集
$row=$result->fetch_assoc();			 ?>
 <h2 align="center">更新留言</h2>
<form method="post" action="edit.php?id=<?= $row['ID'] ?>">
  <table width="400" border="1" align="center" cellpadding="2">
<tr> <td width="125">留言标题：</td><td width="275">
<input type="text" name="title" value="<?= $row['title'] ?>"> *</td></tr>
	<tr> <td width="125">留言类型：</td><td>
<select name="clas">
<? 	$conn->next_result();		//转到下一个结果集
	$rs=$conn->store_result();			//获取第2个结果集
while($row2=$rs->fetch_assoc()){ 		//将class字段填充到下拉框中	?>
	<option  value="<?= $row2["class"] ?>" <? if($row2["class"]==$row['class']) echo "selected"; ?>><?= $row2["class"] ?></option>
		<? } ?>
</select>  *</td></tr>
    <tr><td>留言人：</td>
      <td><input type="text" name="author" value="<?= $row['author'];?>"> *</td></tr>
    <tr><td>联系方式：</td>
      <td><input type="text" name="email" value="<?= $row['email'];?>"> *</td></tr>
<tr><td>留言内容：</td><td><textarea name="content" cols="30" rows="2">
<?= $row['content'];?></textarea></td></tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="确 定"></td></tr>
</table></form>
