<? 	require('conn.php'); 
if ($_GET["del"]==1){ 		//如果用户按了“删除”按钮
		$selectid=$_POST["selected"];		//获取所有选中多选框的值，保存到数组中
	if( count($selectid)>0){			//防止selectid值为空时执行SQL语句出错
		$sel=implode(',',$selectid); 		//将各个数组元素用“,”号连接起来
		mysql_query( "delete From lyb where ID in ($sel)") or die('执行失败');
		header("Location:delall.php");		//删除完毕，刷新页面
		}
	else echo '没有被选中的记录';
}
$result=mysql_query("Select * from lyb",$conn); 		//创建结果集
	?>
<form method="post" action="?del=1"> <!--表单提交给自身-->
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th>
    <th>来自</th><th>删除</th><th>更新</th> </tr>
 <? while($row=mysql_fetch_assoc($result)){ 
?>
  <tr> <td><?= $row['title']?></td> <td><?= $row['content']?></td>
    <td><?= $row['author']?></td> <td><?= $row['email']?></td>
    <td><?= $row['ip']?></td>
	<td align="center">
<input type="checkbox" name="selected[]" value="<?= $row['ID']?>"></td> <!--复选框-->
	<td><a href="editform.php?id=<?= $row['ID']?>">更新</a></td></tr>
  <? } ?>
<tr bgcolor="#E0E0E0">
	<td></td><td></td><td></td><td></td><td></td>
	<td align="center"><input type="submit" value="删 除"></td> <!--删除按钮-->
	<td></td></tr>
</table></form>
