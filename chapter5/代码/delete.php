<? 	require('conn.php'); 
$id=intval($_GET['id']);			//获取5-6.php传来的id参数并转换为整型
$sql="delete from lyb where ID=$id";
if(mysql_query($sql) && mysql_affected_rows()==1)	//执行sql语句并判断执行是否成功
		echo "<script>alert('删除成功！');location.href='5-6.php'</script>";
else
		echo "<script>alert('删除失败！');location.href='5-6.php'</script>";	
?>
