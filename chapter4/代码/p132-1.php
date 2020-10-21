<? 
header('Refresh:3; url=http://ec.hynu.cn'); 	//3秒后转到ec.hynu.cn

header('Expires: Mon,26 Jul 1997 05:00:00 GMT'); 	//设置过期时间为过去某一天
header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');

?>
