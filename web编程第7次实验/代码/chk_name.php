<?//在数据库中查询post数组传来的用户名是否存在
require('conn.php');
$name = $_POST["usr_name"];
$sql = "select * from register where name='".$name."'";
$result = mysql_query($sql,$conn);

$rows = mysql_num_rows($result);
if($rows==0){
	echo("√");
}
else{
	echo("×已占用！");
}



?>