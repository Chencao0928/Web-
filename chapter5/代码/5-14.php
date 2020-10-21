<? require('conn.php');
if(isset($_GET['page']) && (int)$_GET['page']>0)			 //获取页码
		$Page=$_GET['page'];
else	$Page=1;
//设置每页显示记录数
$PageSize=4; 		
$result=mysql_query("Select ID from lyb",$conn); 		//创建结果集
$RecordCount=mysql_num_rows($result); 		//获取记录总数
mysql_free_result($result);
	//计算有多少页
 $PageCount =ceil($RecordCount/$PageSize);
		//将所有记录放入结果集
$result=mysql_query("Select * from lyb", $conn); 
	//显示记录		?>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th><th>来自</th> </tr>
  <? 		//将指针指向第$Page页第1条记录
  mysql_data_seek($result,($Page-1)*$PageSize);
  for($i=0;$i<$PageSize;$i++){
		 $row=mysql_fetch_assoc($result); 
 	 if($row){ 		//如果记录不为空，用来处理末页的情况
 ?>
  <tr><td ><?= $row['ID'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
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
