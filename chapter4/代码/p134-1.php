<?  ob_start();
	echo "第一条";
	ob_flush();		//立刻输出缓冲区中的内容
	echo "第二条";
	ob_clean()	;	//清除缓冲区中的内容
	echo "第三条"	;
	ob_end_flush();	//发送缓冲区的内容到浏览器，并且关闭缓冲区
?>
