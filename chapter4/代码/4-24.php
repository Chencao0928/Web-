<?			// $upload_dir是上传文件的目录，getcwd()可获取当前脚本所在目录
$upload_dir = getcwd() . "\\images\\";		// 即“当前目录\images”
if(!is_dir($upload_dir))			// 如果目录不存在，则创建
	mkdir($upload_dir);	
function makefilename() {		// 此函数用于根据当前时间生成上传文件名
	$curtime = getdate();	// 获取当前系统时间，生成文件名
	$filename =$curtime['year'] . $curtime['mon'] . $curtime['mday'] . $curtime['hours'] . $curtime['minutes'] . $curtime['seconds'] . ".jpg";
		return $filename; 		// 返回生成的文件名
	}
$newfilename = makefilename();
$newfile = $upload_dir . $newfilename;		//生成文件路径名加文件名
if(file_exists($_FILES['upfile']['tmp_name'])) {	//如果这个临时文件存在，表明上传成功
	move_uploaded_file($_FILES['upfile']['tmp_name'], $newfile);
	echo "客户端文件名：" . $_FILES['upfile']['name'] . "<br>";
	echo "文件类型：". $_FILES['upfile']['type']. "<br>";	
	echo "大小：" . $_FILES['upfile']['size'] . "字节<br>";
	echo "服务器端临时文件名：" . $_FILES['upfile']['tmp_name'] . "<br>";
	echo "上传后的文件名：" . $newfile . "<br>";
	echo '文件上传成功 [ <a href="#" onclick="history.go(-1)">继续上传</a> ]
			<p>下面是上传的图片文件:</p>
		<img src="images/'.$newfilename .'">';}		//用img标记显示上传的图片
	else 	echo "上传失败,错误类型:".$_FILES['upfile']['error'];
?>
