<? 
header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
  $act=$_GET["act"];
  $id=$_GET["id"];

if($act=="del")	{		 	//删除记录	

	$sql="delete from lyb where id=$id";
	if ($conn->query($sql)) fy();	}

if($act=="list") fy();

function fy() {

 $sql="select * from lyb";
	//echo $sql;
global $conn;
$result=$conn->query($sql);	
$RecordCount=$result->num_rows;
if($RecordCount>0) {

if(isset($_GET['pageNo']) && (int)$_GET['pageNo']>0)			 //获取页码
		$pageNo=$_GET['pageNo'];
	else
		$pageNo=1;
//开始分页显示记录，指向要显示的页，然后逐条显示当前的所有记录
$PageSize=4;	 //设置每页显示4条记录
$PageCount =ceil($RecordCount/$PageSize);
  $result->data_seek(($pageNo-1)*$PageSize);

for($i=0;$i<$PageSize;$i++){
		 $row=$result->fetch_assoc(); 
if($row){ 		//如果记录不为空，用来处理末页的情况


echo "<tr><td width='100'>".$row["title"]."</td>";
	echo "<td>".$row["content"]."</td><td>".$row["author"]."</td>";
	echo "<td>".$row["email"]."</td><td>".$row["ip"]."</td>";
	echo "<td><a href='javascript:;' onclick='edit1(".$row["ID"].")'>编辑</a></td>";
	echo "<td><a href='javascript:;'  onclick='del1(".$row["ID"].",".$pageNo.")'>删除</a></td> </tr>";
	}}
	
//下面是显示分页链接的代码
$Str = $Str . "<a href='javascript:void(getweblist(1))'><<</a> ";
      for($i=1;$i<=$PageCount;$i++){
	 
        if($i==$pageNo)
 $Str = $Str. "<span style='font-weight:bold;color:red;font-size:16px;'>" . $i . "</span> ";
       else
       $Str = $Str."<a href=javascript:void(getweblist(". $i ."))>" . $i . "</a> ";
}
 $Str =  $Str . " <a href='javascript:void(getweblist(" . $PageCount . "))'>>></a>";

echo  "<tr><td colspan='7'>".$Str."</td></tr>";
} } 

?>