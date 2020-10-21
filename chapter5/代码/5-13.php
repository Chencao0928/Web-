<? 	require('conn.php'); 
if(isset($_GET['page']) && (int)$_GET['page']>0)		 //获取页码并检查是否非法
		$Page=$_GET['page'];
else	$Page=1; 	 		//如果获取不到页码则显示第1页
//设置每页显示记录数
$PageSize=4; 		
$result=mysql_query("Select count(ID) from lyb",$conn); 	//创建统计记录总数的结果集
$row=mysql_fetch_row($result);
$RecordCount=$row[0]; 	//获取记录总数
	//计算总共有多少页
$PageCount =ceil($RecordCount/$PageSize);
		//将某一页的记录放入结果集
$result=mysql_query("Select * from lyb limit ". ($Page-1)*$PageSize." , ".$PageSize, $conn); 
	//显示记录		?>
<h3 align="center">分页显示记录</h3>
<table border="1" width="95%">
  <tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th><th>来自</th> </tr>
  <? while($row=mysql_fetch_assoc($result)){  ?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? } 
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
