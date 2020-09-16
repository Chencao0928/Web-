<html><body>
	<?  echo '<p>PHP代码和HTML代码可相互嵌套</p>';
for($i=3;$i<7;$i++){ ?>
		<font size="<? echo $i;?>">第<? echo $i-2;?>次Hello World!</font><br />
<? }?>
</body>
</html>
