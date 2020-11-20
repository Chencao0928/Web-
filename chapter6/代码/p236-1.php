	<?	
	if(!file_exists('temp')) mkdir('temp');		//在当前目录下创建temp目录
	else echo '该目录已存在，不能创建<br>';
	if(file_exists('data')) rmdir('data');		//在当前目录下删除data目录
	else echo '该目录不存在，不能删除<br>';	
	echo getcwd();			//输出当前所在目录
	chdir('../');			//转到上一级目录
	echo getcwd();			//再输出当前所在目录		?>
