<? 	require('conn_pdo.php');			// conn.php见5.7.2节清单5-19
	$affected=$db->exec("update lyb set content='用PDO修改1条记录' where author='蓉蓉'");
	 ?>
<p>共有 <?= $affected ?>行记录被修改</p>
