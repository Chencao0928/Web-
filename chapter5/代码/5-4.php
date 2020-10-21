<?	require('conn.php');	
mysql_query( " Delete from lyb where ID in(158,162,163,169)") or die('执行失败');
?>
本次操作共有<?= mysql_affected_rows() ?>条记录被删除！
