<? 
header("Content-type: text/html; charset=utf-8"); 
require('conn.php');

$act=$_GET["act"]; 

   if($act=="list")	{
   $sql="select * from lyb order by ID desc";
	//echo $sql;
	$result=$conn->query($sql);	
$RecordCount=$result->num_rows;
if($RecordCount>0) {

	if($_GET["pageNo"]=="") 
		$pageNo=1;	//如果没有页码则显示第1页
	else $pageNo=intval($_GET["pageNo"]);

//开始分页显示记录，指向要显示的页，然后逐条显示当前的所有记录
$PageSize=4;		 //设置每页显示4条记录
//pageS=rs.PageSize  'PageS变量用来控制显示当前页记录
//rs.AbsolutePage=pageNo'设置当前显示第几页
$PageCount =ceil($RecordCount/$PageSize);
  $result->data_seek(($pageNo-1)*$PageSize);
  for($i=0;$i<$PageSize;$i++){
		 $row=$result->fetch_assoc(); 
 	 if($row){ 		//如果记录不为空，用来处理末页的情况


	echo "<tr><td width='100'>".$row["title"]."</td>";
	echo "<td>".$row["content"]."</td><td>".$row["author"]."</td>";
	echo "<td>".$row["email"]."</td><td>".$row["ip"]."</td>";
	echo "<td><a href='javascript:;' onclick='edit1(".$row["ID"].")'>编辑</a></td>";
	echo "<td><a href='javascript:;'  onclick='del1(".$row["ID"].")'>删除</a></td> </tr>";
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
} } ?>