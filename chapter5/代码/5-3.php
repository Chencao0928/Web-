<?	require('conn.php');		
mysql_query( "insert into lyb ( title, content, author, email,`date`) values ('��Һ�', 'PHPѧϰ԰��', 'С���', 'sdf@sd.com','2012-3-3')") or die('ִ��ʧ��');
echo '������¼��id��'.mysql_insert_id();		//��ѡ������¼�¼��id
?>
