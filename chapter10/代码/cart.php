<? session_start();
header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
$id=$_GET["id"];		//获取商品id

$spn=unescape($_GET["spn"]);	//获取商品名
$spt=unescape($_GET["spt"]);	//获取商品类型
$spp=$_GET["spp"];
$num=$_GET["num"];

$result=$conn->query("Select * from cart where spid=$id and user='".$_SESSION["user"]."'");		

if($result->num_rows>0) {	//如果购物车中有这种商品

$sql="update cart set num=num+".$num." where spid=$id";		//将这种商品的件数增加
$conn->query($sql);
$result=$conn->query("Select * from cart where spid=$id and user='".$_SESSION["user"]."'");	
$row=$result->fetch_assoc();

echo $row['num'].'|'.$id; }		//输出该商品的id和最新的件数
else		//如果购物车中没有这种商品
{
$sql="insert into cart(spid,name,price,num,type,user) values($id,'".$spn."',".$spp.",".$num.",'".$spt."','".$_SESSION["user"]."')";
if($conn->query($sql)) echo 1;
}
 ?>
