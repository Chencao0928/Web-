<? header("Content-type: text/html; charset=gb2312"); 
require('conn.php');
$id=$_GET["id"];	//��ȡ10-13.html������������
$sql="select * from news where ID=$id"; 
$result=$conn->query($sql);
$row=$result->fetch_assoc();
echo "<img width='280' src='uppic/". trim($row["firstImageName"])."'/><br/><a href='onews.php?id=".$row["id"]."'>".Trimtit($row["title"],20)."</a>";
?>
