<? 	require('conn_pdo.php');			// conn.php��5.7.2���嵥5-19
	$affected=$db->exec("update lyb set content='��PDO�޸�1����¼' where author='����'");
	 ?>
<p>���� <?= $affected ?>�м�¼���޸�</p>
