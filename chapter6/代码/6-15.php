<?
if(copy('test.txt','./data/bak.txt'))		//复制文件示例
 	echo '文件复制成功';
else '文件复制失败，源文件可能不存在';

unlink('./test.txt');	//删除文件示例

if(file_exists('./data/bak.txt')){		//移动文件示例
if(rename('./data/bak.txt','tang.txt'))
	echo '文件移动并重命名成功';
else echo '文件移动失败';
}
?>

