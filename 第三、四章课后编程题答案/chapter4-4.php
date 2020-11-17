<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第4题</title>
</head>
<body>
	<?php
		echo "猜数字游戏：";
		if(isset($_GET["input_num"])){//session记录尝试次数和随机数
            //$last_time = $_GET["last"];
			$rand_num = $_GET["rand_num"] ;
			$guess_num = $_GET["input_num"];
            $b=$_GET["last"];
            
            $a=$_GET["rand_num"];
            $b--;
			if($b<=0){
				die("很遗憾，您没有猜对，机会已用完！") ;
            }
            
			if($guess_num>$rand_num){//大
				
				echo "猜大了，您还有".$b."次机会";
			}
			else if($guess_num<$rand_num){//小
				echo "猜小了，您还有".$b."次机会";
			}
			else{//等
				echo "您猜对了，数字为$guess_num";
			}
		}
		else{
			$a = rand(1,10);
            $b = 6;
		}
	?>
	<form action="" method="get" name="guess_num">输入整数（1-10）：<br/>
		<input type="text" name="input_num" size="6">
		<input type="hidden" name="rand_num" value="<?= $a?>">
		<input type="hidden" name="last" value="<?= $b?>">
		<input type="submit" name = "btn_submit" value = "确定">
	</form>
</body>
</html>