<? session_start();
$fp=fopen("count.txt","r+");
$Visitors=fgets($fp);			//读取原有访问次数
if(!$_SESSION['connected']){
		$Visitors++;   		 	//将访问次数加1
		$_SESSION['connected']=true;	}
$countlen=strlen($Visitors);	//获取访问次数的数字长度
//逐个取visitors的每个字节，然后串成<img src=?.gif>图形标记
for( $i=0;$i<$countlen;$i++)		 //下面输出数字对应的img元素
		$num=$num."<img src=img/".substr($Visitors,$i,1) .".gif></img>";
rewind($fp);
fwrite($fp,$Visitors);		//将新的访问次数写回文件
fclose($fp);	?>
<h2>欢迎进入PHP的世界</h2><hr>
您是本站第<?=$num ?>位贵宾。
