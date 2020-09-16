<? 	$str1="Hello";				//在弹出框中显示
	$str2="start PHP";				//在文本框中显示
	echo "<script>";
	echo "alert('".$str1."');";			//在JavaScript中使用 $str1变量
	echo "</script>";	?>
<input type="text" name="tx" size=20 value="<? echo $str1; ?>">
<input type="button" value="单击" onclick="tx.value='<? echo $str2; ?>'">
