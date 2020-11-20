<?		
if(copy('test.txt','./data/bak.txt'))		//复制文件示例
 	echo '文件复制成功';
else echo '文件复制失败，源文件可能不存在';
	//删除文件示例
unlink('./test.txt'); 		//删除当前文件夹下的test.txt
	//移动文件示例
if(file_exists('./data/bak.txt')){			//判断源文件是否存在
		if(rename('./data/bak.txt','tang.txt')) 		//移动并重命名为tang.txt
			echo '文件移动并重命名成功';
		else echo '文件移动失败';
}	?>
