<? 	$str1="Hello";				//�ڵ���������ʾ
	$str2="start PHP";				//���ı�������ʾ
	echo "<script>";
	echo "alert('".$str1."');";			//��JavaScript��ʹ�� $str1����
	echo "</script>";	?>
<input type="text" name="tx" size=20 value="<? echo $str1; ?>">
<input type="button" value="����" onclick="tx.value='<? echo $str2; ?>'">
