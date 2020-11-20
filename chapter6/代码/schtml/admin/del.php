
<?  require("conn.php"); 
	$id=$_GET["id"];
	$sql="select * from newscontent where id=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$path=$rows["filepath"];	//找到待删除新闻对应的静态html文件的url
	$root=$_SERVER['DOCUMENT_ROOT'];
	$filepath="../list/".$path;
	if(file_exists($filepath))
			unlink($filepath);	//删除静态html文件
	
	$path=substr($path,0,10);	//找到为存放静态html文件而创建的目录
	$folderpath="../list/$path";
	$folder=opendir($folderpath);	//打开该目录
	$n=0;
	while($f=readdir($folder))	{
		if($f<>"."&&$f<>"..")	//如果目录中还有其他文件
			$n++;
	}
	closedir();
	if($n==0)	//目录中已经没有任何文件
		rmdir($folderpath);	//删除该目录
	$sql="delete from newscontent where id=$id";	//删除数据表中的记录
	
	if(mysql_query($sql))
		echo "<script language=javascript>alert('删除成功！');window.location='adminnews.php'</script>";
	else
		echo "<script language=javascript>alert('操作错误！');window.location='adminnews.php'</script>";
?>

