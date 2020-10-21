<h3 align="center">查询结果</h3>
<? 	require('conn.php'); 
$keyword=trim($_GET['keyword']);		//获取输入的关键字
$sel=$_GET['sel'];						//获取选择的查询方式
$sql="select * from lyb";
if ($keyword <> "")
		$sql=$sql ." where $sel like '%$keyword%'";	//构造查询语句
$rs=mysql_query( $sql) or die('执行失败');
if (mysql_num_rows($rs)>0) {
		echo "<p>关键字为“ $keyword ”，共找到".mysql_num_rows($rs)." 条留言</p>"; ?>
<table border="1" align="center">
  <tr bgcolor="#e0e0e0">
    <th>标题</th> <th width="100">内容</th> <th width="60">作者</th>
    <th>email</th> <th width="80">来自</th></tr>
  <? while($row=mysql_fetch_assoc($rs)){ 
?>
  <tr><td ><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?></td></tr>
  <? }}
else	echo "没有搜索到任何留言";	?>
</table>
