<html><body>
	<h3 align="center">
	<? 	$name=$_POST["name"];	//��ȡ������Ԫ�ص�ֵ
	$Sex=$_POST["Sex"];
	$hobby=$_POST["hobby"];
	$career=$_POST["career"];
	$intro=$_POST["intro"];
	$hobbynum=count($hobby);
	echo  "�𾴵�".$name ;		//���������Ԫ�ص�ֵ
	if ($Sex=="1") echo "����</h3>";		//���ݵ�ѡ���ֵ���������Ůʿ
	if ($Sex=="0") echo "Ůʿ</h3>";
	echo "<p>��ѡ����".$hobbynum."��ã�</p>" ;
	for($i=0;$i<$hobbynum;$i++) 	//ͨ��ѭ�������ѡ���ֵ
	  echo $hobby[$i].' ';
	echo "<br>����ְҵ��" . $career;
	echo "<br>���ĸ���ǩ����" .$intro;
	//var_dump($_POST);			//��ȡ���б�Ԫ�ص�ֵ
?>
	<p><a href="JavaScript:history.go(-1)">�����޸�</a></p>
</body></html>
