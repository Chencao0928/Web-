<? 	require('conn.php'); 
$id=intval($_GET['id']);			//��ȡ5-6.php������id������ת��Ϊ����
$sql="delete from lyb where ID=$id";
if(mysql_query($sql) && mysql_affected_rows()==1)	//ִ��sql��䲢�ж�ִ���Ƿ�ɹ�
		echo "<script>alert('ɾ���ɹ���');location.href='5-6.php'</script>";
else
		echo "<script>alert('ɾ��ʧ�ܣ�');location.href='5-6.php'</script>";	
?>
