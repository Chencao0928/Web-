<? 	require('conn.php');
require('5-15.php'); 		 //调用分页函数所在文件
if(isset($_GET['Page']) && (int)$_GET['Page']>0)			 //获取页码
		$Page=$_GET['Page'];
else	$Page=1;
$PageSize=4; 		//设置每页显示记录数
$result=mysql_query("Select ID from lyb",$conn); 		//创建结果集
$RecordCount=mysql_num_rows($result); 		//获取记录总数
	//删除了原来程序中计算$PageCount的代码
$result=mysql_query("Select * from lyb", $conn); 
	//显示记录		?>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th>
    <th>来自</th> </tr>
  <? 		//将指针指向第$Page页第1条记录
  mysql_data_seek($result,($Page-1)*$PageSize);
  for($i=0;$i<$PageSize;$i++){
		 $row=mysql_fetch_assoc($result); 
 	 if($row){ 		//如果记录不为空，用来处理末页的情况
 ?>
  <tr><td ><?= $row['ID'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td></tr>
  <? } } 
  mysql_free_result($result);  ?>
</table>
<?	$url = $_SERVER["PHP_SELF"];		//获得当前页的URL
page($RecordCount,$PageSize,$Page,$url,$keyword); 	//调用分页函数
?>
