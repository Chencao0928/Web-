<?
setcookie('userName','');				//ɾ��Cookie�ķ���1
setcookie('age',21,time()-600);			//ɾ��Cookie�ķ���2
setcookie('sex','Ů',time()-600);
var_dump($_COOKIE); 			//�����鿴����Cookie����Ԫ���Ƿ��Ѿ�ɾ��
?>
