<table border="1" width="200" align="center"><tr>
<?	$i=0;
while($i<9){
		echo "<td>第$i 格</td>";	//输出表格的单元格
		$i++;
		if($i%3<>0||$i==9) continue;
		echo "</tr><tr>";
}  ?> 
</tr></table>
