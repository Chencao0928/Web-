<?	$num=0;                 //$num用来统计子目录和文件的总数
	$dir='fnnews';            	//$dir用来设置要遍历的目录名
	$dirh=opendir($dir);       		//用opendir打开目录
	?>
<table border="1" width="600">
<caption><b>目录<?= $dir?>中的内容</b></caption>
<tr align="left" bgcolor="#cccccc">
<th>文件名</th><th>大小</th><th>类型</th><th>修改时间</th></tr>
	<?
while($file=readdir($dirh)) {    		//使用readdir循环读取目录里的内容
	if($file!="." && $file!="..") {  
		$dirFile=$dir."/".$file;      	//将目录下的文件和当前目录连接起来
		$num++;
		echo '<tr bgcolor='.$bgcolor.'>';            	//输出行开始标记，并使用背景色
		echo '<td>'.$file.'</td>';                   	//显示文件名
     echo '<td>'.filesize($dirFile).'</td>';         //显示文件大小
     echo '<td>'.filetype($dirFile).'</td>';         //显示文件类型
    echo '<td>'.date("Y/n/t",filemtime($dirFile)).'</td></tr>';       //显示修改时间
         	}}
closedir($dirh);                               //关闭文件操作句柄
	?></table> 
在<b><?= $dir?></b>目录下的子目录和文件共有<b><?= $num?></b>个
