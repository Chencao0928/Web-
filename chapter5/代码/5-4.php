<?	require('conn.php');	
mysql_query( " Delete from lyb where ID in(158,162,163,169)") or die('ִ��ʧ��');
?>
���β�������<?= mysql_affected_rows() ?>����¼��ɾ����
