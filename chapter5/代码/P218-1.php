<? 	require('conn_pdo.php');			// conn.php��5.7.2���嵥5-19
	$sql="insert into lyb(title,content,author) values(?,?,?)";	//��?����ռλ��
	$stmt=$db->prepare($sql);	//׼��ִ�в�ѯ
	$title='PDOԤ����';	$content='���ǲ���ļ�¼';	$author='������';
	$stmt->bindParam(1,$title);	//�󶨵�1������
	$stmt->bindParam(2,$content);
	$stmt->bindParam(3,$author);
	$stmt->execute();			//ִ�в�����䣬������һ����¼
 echo '�²����¼��ID�ǣ�'.$db->lastInsertId();
			//���Ҫ�ٲ����¼��ֻҪ�������Ĵ��뼴��
	$title='�ڶ���';	$content='�ڶ��β���ļ�¼';	$author='�鷨��';
	$stmt->execute();			//�ٴ�ִ�����°󶨲�����׼����䣬����ڶ�����¼
	 ?>
