<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
$result=$conn->query("Select * From lyb limit 4 "); 
  $key=unescape(trim($_GET["key"]));  //获得$.get()发送来的key
  $sel=$_GET["sel"]; 

$sql="select * from lyb";
if($key!= "") $sql=$sql ." where $sel like '%$key%'";
echo $sql;
$result=$conn->query($sql); 

if($result->num_rows>0) { ?>
<p>关键字为“<?= $key ?>”，共找到<?= $result->num_rows ?>条留言</p>
<table border="1">
  <tr bgcolor="#e0e0e0">
		<th>标题</th> <th>内容</th> <th>作者</th>
		<th>email</th> <th>来自</th>
	</tr>
  <? while($row=$result->fetch_assoc()) { ?>
  <tr><td><?= $row['title'] ?></td> <td><?= $row['content'] ?></td>
    <td><?= $row['author'] ?></td> <td><?= $row['email'] ?></td>
    <td><?= $row['ip'] ?> </td></tr>
  		<? } ?>
</table>
<? }
 else	echo "<p>没有搜索到任何留言</p>"; 
 ?>

