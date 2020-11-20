<? //功能：复制带有多级子目录的目录
function copyDir($dirSrc, $dirTo) {      
	if(is_file($dirTo)) {               //如果目标是一个文件则退出
		echo "目标不是目录不能创建!!";
		return 0;                    //退出函数
	}
	if(!file_exists($dirTo))           //如果目标目录不存在则创建，存在则不变
		mkdir($dirTo);             //创建要复制的目录
	if($dirh=@opendir($dirSrc)) {           //打开目录返回目录资源，并判断是否成功
		while($filename=readdir($dirh)) {    //遍历目录，读出目录中的文件或文件夹
			if($filename!="." && $filename!="..") {     //一定要排除两个特殊的目录
				$subSrcFile=$dirSrc."/".$filename;     //将源目录的多级子目录连接
				$subToFile=$dirTo."/".$filename;      //将目标目录的多级子目录连接
				if(is_dir($subSrcFile))                    //如果源文件是一个目录
					copyDir($subSrcFile, $subToFile);     //递归调用自己复制子目录
				if(is_file($subSrcFile))                   //如果源文件是一个普通文件
					copy($subSrcFile, $subToFile);       //直接复制到目标位置
				}			}
			closedir($dirh);       //关闭目录资源
		}	}
	copyDir("fnnews10", "D:/admin");   //调用测试函数
?>
