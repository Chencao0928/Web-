<table border="1" width="200" align="center"><tr>
<?	$i=0;
while($i<9){
		echo "<td>��$i ��</td>";	//������ĵ�Ԫ��
		$i++;
		if($i%3<>0||$i==9) continue;
		echo "</tr><tr>";
}  ?> 
</tr></table>
