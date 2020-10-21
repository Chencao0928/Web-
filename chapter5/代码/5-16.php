<? session_start();
require('conn.php');
if(isset($_GET['page']) && (int)$_GET['page']>0)			 //获取页码
		$Page=$_GET['page'];
else	$Page=1;
//设置每页显示记录数，并将记录数保存到Session变量中
if(isset($_GET['pagesize'])){		//如果用户设置了每页记录数
		$PageSize=$_GET['pagesize'];	//将用户设置的值赋给$PageSize
		$_SESSION["pagezize"]=$_GET['pagesize'];		//将该值保存到Session变量中
}
if($_SESSION["pagezize"]<>"")		//如果SESSION值不为空
		$PageSize=$_SESSION["pagezize"];
else
		$PageSize=4; 	//第一次打开网页时默认每页显示4条
$result=mysql_query("Select * from lyb",$conn); 		//创建结果集
$RecordCount=mysql_num_rows($result); 
$PageCount =ceil($RecordCount/$PageSize); 	//计算有多少页
	//显示记录		?>
<h3 align="center">自定义每页记录数的分页程序</h3>
<form style="margin:0 auto; text-align:center;" method="get" action="">每页显示 <input type="text" name="pagesize" size="3" value="<?= $PageSize?>"> 条 <input type="submit"  value="保存"> </form>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th><th>来自</th> </tr>
  <? 
  mysql_data_seek($result,($Page-1)*$PageSize); 	//将指针指到某页的第1条记录
  for($i=0;$i<$PageSize;$i++){
		 $row=mysql_fetch_assoc($result); 
			 if($row){	 ?>
  <tr><td ><?= $row['ID'];?></td> <td><?= $row['content'];?></td>
    <td><?= $row['author'];?></td> <td><?= $row['email'];?></td>
    <td><?= $row['ip'];?></td>
</tr>
  <? } } 
  mysql_free_result($result);  ?>
</table>
 <p><?	// 显示分页链接的代码
if($Page== 1)	 			//如果是第1页，则不显示第1页的链接
		echo  "第一页  上一页 ";	
else echo " <a href='?page=1'>第一页</a> <a href='?page=". ($Page-1)."'>上一页</a> ";
for($i=1;$i<= $PageCount;$i++)	{ 		 //设置数字页码的链接
		if ($i==$Page) echo "$i  ";		//如果是某页，则不显示某页的链接
		else echo " <a href='?page=$i'>$i</a> ";} 
if($Page== $PageCount)   		 // 设置“下一页”链接
		echo  " 下一页  末页 ";
else echo " <a href='?page=" . ($Page+1) . "'>下一页</a> 
 <a href='?page=" . $PageCount . "'>末页</a> ";
echo " &nbsp 共".$RecordCount. "条记录&nbsp";	 //共多少条记录
echo " $Page / $PageCount 页";			//当前页的位置
?></p>
