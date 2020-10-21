<html><body>
	<h3 align="center">
	<? 	$name=$_POST["name"];	//获取各个表单元素的值
	$Sex=$_POST["Sex"];
	$hobby=$_POST["hobby"];
	$career=$_POST["career"];
	$intro=$_POST["intro"];
	$hobbynum=count($hobby);
	echo  "尊敬的".$name ;		//输出各个表单元素的值
	if ($Sex=="1") echo "先生</h3>";		//根据单选框的值输出先生或女士
	if ($Sex=="0") echo "女士</h3>";
	echo "<p>您选择了".$hobbynum."项爱好：</p>" ;
	for($i=0;$i<$hobbynum;$i++) 	//通过循环输出复选框的值
	  echo $hobby[$i].' ';
	echo "<br>您的职业：" . $career;
	echo "<br>您的个性签名：" .$intro;
	//var_dump($_POST);			//获取所有表单元素的值
?>
	<p><a href="JavaScript:history.go(-1)">返回修改</a></p>
</body></html>
