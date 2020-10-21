<?	require('conn.php');
if(isset($_GET['page']) && (int)$_GET['page']>0)			 //获取页码
		$Page=$_GET['page'];
else	$Page=1;
$PageSize=4; 				//设置每页显示记录数
$keyword=trim($_GET['keyword']); 		//获取查询关键字
$sql="select * from lyb";
if ($keyword <> "")
		$sql=$sql ." where title like '%$keyword%'";
$result=mysql_query($sql,$conn); 		//根据有无查询关键字创建结果集
$RecordCount=mysql_num_rows($result); 	//获得记录总数
$PageCount =ceil($RecordCount/$PageSize); 	//获得总页数
?>
<form method="get" action="">
 <div style="border:1px solid gray; background:#eee;padding:4px;"> 
查找留言：请输入关键字<input name="keyword" type="text" value="<?= $keyword?>">
  <input type="submit" value="查询">
</div></form>
<table border="1" width="95%"><tr bgcolor="#e0e0e0">
    <th>标题</th><th>内容</th><th>作者</th><th>email</th><th>来自</th> </tr>
<? 
mysql_data_seek($result,($Page-1)*$PageSize); 		//将指针指向第$Page页第1条记录
for($i=0;$i<$PageSize;$i++){
		$row=mysql_fetch_assoc($result); 
 	if($row){		 ?>
  		<tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
   		<td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    		<td><?= $row['ip'] ?></td></tr>
  <? }} ?>
</table>
<p><?	// 显示分页链接
	if($Page== 1)   echo  "第一页 上一页 ";
else  echo  " <a href='?page=1&keyword=$keyword'>第一页</a> 
 <a href='?page=" . ($Page-1) . "&keyword=$keyword'>上一页</a> ";
for($i=1;$i<= $PageCount;$i++)	{ 			 //设置数字页码的链接
		if ($i==$Page) echo "$i  ";
		else echo " <a href='?page=$i&keyword=$keyword'>$i</a> ";} 
if($Page== $PageCount)   echo  " 下一页  末页 ";
else echo  " <a href='?page=" . ($Page+1) . "&keyword=$keyword'>下一页</a> 
 <a href='?page=" . $PageCount . "&keyword=$keyword'>末页</a> ";
echo " &nbsp 共".$RecordCount. "条记录&nbsp";	 //共多少条记录
echo " $Page / $PageCount 页";			//当前页的位置
?></p>
