<?      //功能：用递归的方法删除非空的目录$dir
function delDir($dir) {   
if(file_exists($dir)) {      	//判断目录是否存在
	if($dirh=opendir($dir)) {      	//打开目录返回目录资源$dirh
		while($filename=readdir($dirh)) {  //遍历目录，读出目录中的文件或文件夹
			if($filename!="." && $filename!="..") {   	//一定要排除两个特殊的目录
				$subFile=$dir."/".$filename;   	//将目录下的文件和当前目录相连
				if(is_dir($subFile))           	//如果是目录
					delDir($subFile);          //递归调用自身删除子目录
				if(is_file($subFile))            //如果是文件
					unlink($subFile);          //直接删除这个文件
					}	}
				closedir($dirh);                       	//关闭目录资源
				rmdir($dir);                          	//删除空目录
			}		}	}
	delDir("fnnews10");  //调用delDir()函数，将当前目录中的fnnews文件夹删除
	?>
