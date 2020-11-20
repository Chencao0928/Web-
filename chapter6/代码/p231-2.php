<? session_start();
$fp=fopen("count.txt","r+");
$Visitors=intval(fgets($fp));			//读取原有访问次数
if(!$_SESSION['connected']){
		$Visitors++;   		 	//将访问次数加1
		$_SESSION['connected']=true;	}
rewind($fp);
fwrite($fp,$Visitors);			//将新的访问次数写回文件
fclose($fp);
?>
您是本站第<?=$Visitors ?>位贵宾。
