<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第4章课后编程题第1题</title>
</head>

<body>
	<form action="" method="GET" name="form_cal">
		计算器<input type="text" name = "num1" size="8" value="<?=$_GET["num1"] ?>">
		<select name="operation">
			<option value="1">+</option>
			<option value="2">-</option>
			<option value="3">*</option>
			<option value="4">/</option>
		</select>
		<input type="text" name = "num2" size="8" value="<?=$_GET["num2"]?>">
		<input type="submit" name = "submited" value="=">
	</form>
	
	<?
	if(isset($_GET["submited"])){
		$number1 = $_GET["num1"];
		$number2 = $_GET["num2"];
		$operation = $_GET["operation"];
		if($operation==1){
			$res = $number1+$number2;
		}
		else if($operation==2){
			$res = $number1-$number2;
		}
		else if($operation==3){
			$res = $number1*$number2;
		}
		else{
			$res = $number1/$number2;
		}
		echo "$res";
	}
	
	?>	
	
</body>
</html>
