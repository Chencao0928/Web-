<? session_start();
header("Content-type: text/html; charset=utf-8"); 
require('conn.php'); 
$id=$_GET["id"];		//获取记录id
$sql= "Select * From news Where id=$id";
if($_SESSION["id".$id]<>""){		//如果这条记录已经投过票了
	$result=$conn->query($sql);
	if($result->num_rows==0)
		echo "NoData";
	else{
		$row=$result->fetch_assoc();
		echo 'yt|'.$row["dig"];	
	}}
else{		//尚未投过票的情况
	$result=$conn->query($sql);
	if($result->num_rows==0)
		echo "NoData";
	else {
		$row=$result->fetch_assoc();
		$dig =$row["dig"];		
		$sql="Update news Set dig=$dig+1 Where ID=$id";
		$conn->query($sql);		//将数据库中的票数加1
		$_SESSION["id".$id] = $id;	//写入Session变量
		echo ++$dig;
	}}
?>