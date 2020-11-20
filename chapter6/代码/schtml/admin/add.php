<?	require("conn.php");
	$title=$_POST["title"];	//获取用户在表单中输入的内容
	$author=$_POST["author"];
	$lanmu=$_POST["lanmu"];
	$content=$_POST["content"];
	$time=date("Y-m-d H:i:s");
		
	$root=$_SERVER['DOCUMENT_ROOT'];	//创建存放当天静态html文件的目录
	$foldername=date("Y-m-d");
	$folderpath="../list/".$foldername;	//目录形式是“list\2013-07-01”
	if(!file_exists($folderpath))		//如果文件夹不存在
			mkdir($folderpath);
		
	$filename=date("H-i-s").".html";	//用时间创建html文件的文件名
	$filepath=$folderpath."/".$filename;	//得到文件相对于网站根目录的URL（路径名加文件名）
		
	if(!file_exists($filepath)){	//如果待生成的文件不存在
		
		$sql="select html from moban where id=2";	//从moban表中读取模板页代码
		$rs=mysql_query($sql);
		$rows=mysql_fetch_row($rs);
		$moban=$rows[0];	//$moban保存了模板页代码
			//echo $moban;
			//$mobanpath="../moban/moban.html";
			//$fp=fopen($mobanpath,"r");   
			//$str=fread($fp,filesize($mobanpath));//读出模板
			//fclose($fp);
			$moban=str_replace("-lanmu-",$lanmu,$moban);	//替换模板页中相应的标识符
			$moban=str_replace("-title-",$title,$moban);
			$moban=str_replace("-time-",$time,$moban);
			$moban=str_replace("-content-",$content,$moban);
			$moban=str_replace("-author-",$author,$moban);
			//把替换过了的模板页写入文件
			$fp=fopen($filepath,"w");	//创建html文件
			fwrite($fp,$moban);			//将替换好的模板页内容写入到文件中
			fclose($fp);
			$filepath=$foldername."/".$filename;	//保存生成的html文件的路径
				//将用户输入的内容插入到数据表中
			$sql="insert into newscontent(bigclass,title,content,filepath,author,time) values ('$lanmu','$title','$content','$filepath','$author','$time')";
			if(mysql_query($sql))	//如果插入成功
				echo "<script>if (confirm('添加成功！是否继续添加·继续添加  ·返回查看')){window.location='addnews2.php'}else {window.location='adminnews.php'} </script>";		
			else			
			echo "<script>alert('添加失败！');location.href='adminnews.php';</script>";			
		}
?>