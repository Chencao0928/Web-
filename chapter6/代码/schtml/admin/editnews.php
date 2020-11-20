
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>PHP生成静态页面小程序 v1.1 - 夏日博客</title>
<link rel="stylesheet" href="Style.css" type="text/css">
</head>
<body>
<? require("conn.php"); 
	$id=$_GET["id"];
	if($_POST["Submit"])	//如果单击了提交按钮
	{
		$title=$_POST["title"];		//获取用户输入的内容
		$author=$_POST["author"];
		$lanmu=$_POST["lanmu"];
		$content=$_POST["content"];
		$path=$_POST["path"];
		$time=$_POST["time"];
		
		$root=$_SERVER['DOCUMENT_ROOT'];
		$filepath="../list/$path";
		if(file_exists($filepath))		//如果静态html页面存在
		{
			$sql="select html from moban where id=2";
			$rs=mysql_query($sql);
			$rows=mysql_fetch_row($rs);
			$moban=$rows[0];	//读取模板页
			
			$moban=str_replace("-lanmu-",$lanmu,$moban);	//替换模板页中对应字符串
			$moban=str_replace("-title-",$title,$moban);
			$moban=str_replace("-time-",$time,$moban);
			$moban=str_replace("-content-",$content,$moban);
			$moban=str_replace("-author-",$author,$moban);
			$fp=fopen($filepath,"w");
			fwrite($fp,$moban);		//将依据模板页生成的html代码写入到文件中
			fclose($fp);
		}
			//修改数据表中对应的记录
		$sql="update newscontent set title='$title',content='$content',author='$author',bigclass='$lanmu' where id=$id";
		if(mysql_query($sql))
			echo "<script language=javascript>alert('修改成功！');location.href='adminnews.php'</script>";
	
		else	echo "<script language=javascript>alert('修改失败！');location.href='adminnews.php'</script>";	
		die();	//退出程序
	}
	$sql="select * from newscontent where id=$id";	//读取id对应的记录
	$rs=mysql_query($sql);
	$row=mysql_fetch_assoc($rs);	//接下来将记录显示在表单中
?>
<h3 align="center">新闻修改页面</h3>
<form method="post" action="?id=<?= $row['id'] ?>"><!--提交表单将发送URL字符串-->
  <table width="480" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tbody bgcolor="#ffffff">
    <tr>
      <td width="125">新闻标题：</td>
      <td width="375"><input type="text" name="title" size="30" value=<?= $row['title'] ?>></td>
    </tr>
    <tr>
      <td>发布者：</td>
      <td><input type="text" name="author" value=<?= $row['author'] ?>></td>
    </tr>
    <tr>
      <td>所属栏目：</td>
      <td><input type="text" name="lanmu" value=<?= $row['bigclass'] ?>></td>
    </tr>
    <tr>
      <td>新闻内容：</td>
      <td><textarea name="content" cols="30" rows="3"><?= $row['content'] ?></textarea></td>
    </tr>
	 <tr>
      <td><input name="time" type="hidden" value="<?= $row['time'] ?>">   
<input name="path" type="hidden" value="<?= $row['filepath'] ?>"></td>
      <td><input name="Submit" type="submit" value="提 交"> </td>
    </tr>
	</tbody>
  </table>
</form> 
</body>
</html>
