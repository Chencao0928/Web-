<?
if($_GET['action'] == "logout"){
session_start();		//�����Ự
setcookie("user","",time()-60);	//���ỰCookie����user����Ϊ���ڣ���ɾ��Cookie
session_unset();		//ɾ��$_SESSION�е�Session����
session_destroy();		//����Session��ɾ��Session ID
header("Location:4-14.php");		//�ص���¼����
}	?>
