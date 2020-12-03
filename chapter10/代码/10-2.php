<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
$result=$conn->query("Select * From lyb limit 4 "); 
echo '[';
$i=0;
while($row=$result->fetch_assoc()){  ?>
 {title:"<?= $row['title'] ?>",
 		content:"<?= $row['content'] ?>",
		author:"<?= $row['author'] ?>",
 		email:"<?= $row['email'] ?>",
		ip:"<?= $row['ip'] ?>"}
<?
if($result->num_rows!=++$i) echo ',';	//如果不是最后一条记录
}
echo ']'	
?>

