<? 
header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
$id=$_POST["id"];		//获取记录id
//echo $id;
$act=$_REQUEST["act"]; 



if($act=="edit")	{		//显示记录中原有的内容到编辑表单中
	$sql="select * from lyb where ID= $id order by ID desc";
	//echo $sql;
	$result=$conn->query($sql);	
	//var_dump($result);
if($result->num_rows>0) {
	$row=$result->fetch_assoc();
	   $id = $row["ID"];
	   $title=$row["title"];
		$author = $row["author"];
		$email = trim($row["email"]);		
		$content = trim($row["content"]);		
	
		echo $id."|".$title."|".$author."|".$email."|".$content;
}}
 
   if($act=="modify"){		//修改数据表中的相关数据，完成在服务器端的修改
	$id=$_POST["id"];
	   $title= unescape($_POST["title"]);
		$author = unescape($_POST["author"]);
		$email = unescape(trim($_POST["email"]));		
		$content = unescape(trim($_POST["content"]));	
	$sql="Update lyb Set title='$title',author='$author',email='$email',content='$content' Where ID=$id";
	
if($conn->query($sql)) echo 1;		//输出1通知客户端记录已修改成功
}
 
//--------添加到10-19.asp中的代码（10-19p.asp）--------------
if($act=="del"){
	$id = $_GET["id"];
	$sql= "delete from lyb where ID=$id";	//删除id对应的记录
	if($conn->query($sql)){
	$sql="select * from lyb order by ID desc";
	//echo $sql;
	$result=$conn->query("select * from lyb order by ID desc");
	  while($row=$result->fetch_assoc()){  ?>
	  <tr id="fff<?= $row['ID'] ?>">
    <td width="100"><?=$row["title"] ?></td>
    <td><?=$row["content"] ?></td>
    <td><?=$row["author"] ?></td>
    <td width="80"><?=$row["email"] ?></td>
    <td><?=$row["ip"] ?> </td>
		<td><a href="javascript:;"  onclick="edit1(<?=$row["ID"] ?>)">编辑</a></td>
		<td><a href="javascript:;"  onclick="del1(<?=$row["ID"] ?>)">删除</a></td>
	 </tr>	
	 <? }} }?> 
