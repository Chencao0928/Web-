<?	session_start();
ini_set('session.save_path','/tmp/');			//���ñ���·��
ini_set('session.gc_maxlifetime', 60);		//����1����
setcookie(session_name(), session_id(), time() + 60, "/");		//���ûỰcookie�Ĺ���ʱ��

?>
