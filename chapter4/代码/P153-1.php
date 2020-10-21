<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>计算器程序</title>
</head>

<body>  <?
if(isset($_POST['dengy'])) {			//判断用户是否提交了表单（即单击了提交按钮）
	$obj1=$_POST["obj1"];
	$obj2=$_POST["obj2"];
	$sum=$obj1+$obj2;}
		?>
<form method="post" action="">
 计算器 <input type="text" name="obj1"  size="5" value="<?= $obj1 ?> "/> 
  <select name="fuhao">
    <option value="sum"> + </option>
    <option value="div"> - </option>
    <option value="chen"> * </option>
    <option value="chu"> / </option>
  </select>
  <input type="text" name="obj2"  size="5"  value="<?= $obj2 ?>"/> <input name="dengy" value=" = " type="submit" />
<?= $sum ?>
</form>


</body>
</html>