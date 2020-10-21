<?	session_start();
ini_set('session.save_path','/tmp/');			//设置保存路径
ini_set('session.gc_maxlifetime', 60);		//保存1分钟
setcookie(session_name(), session_id(), time() + 60, "/");		//设置会话cookie的过期时间

?>
