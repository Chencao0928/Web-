<? 	require('conn_pdo.php');			// conn.php��5.7.2���嵥5-19
		$sql="select * from lyb where title like ?";		//��?����ռλ��
	$stmt=$db->prepare($sql);			//׼��ִ�в�ѯ
	$title='����';
	$stmt->execute(array("%$title%"));		//ִ�в�ѯ��ͬʱ�󶨲���
$row=$stmt->fetch(1); 			//�Թ����������ʽ��������е�1����¼ȡ��
var_dump($row); 				//�������
echo $row['title'];		?>

