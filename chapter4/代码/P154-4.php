猜数字游戏：
<?
if(!isset($_POST['sub']))				//判断提交按钮是否按下，按下则button=提交
$a=rand(1,10);		//使用rand()函数产生一个随机数
$b=5;
?>
<?
if(isset($_POST['sub']))				//判断提交按钮是否按下，按下则button=提交
{
		$SZ=$_POST["SZ"];					//接收文本框SZ的值
		$a=$_POST["rand"];	
		$b=$_POST["last"];						//使用rand()函数产生一个随机数
		$b--;
		if($SZ>$a)								//输入数的值与随机数进行比较
			echo "猜大了，你还有 $b 次机会";
		elseif($SZ<$a)
			echo "猜小了，你还有 $b 次机会";
		else { $c=5-$b;
			echo "您猜对啦！用了 $c 次机会";
			unset($_POST['sub']);}
}
?>					
<form method="post" action="">	输入整数(1-10)<br />
	<input type="text" name="SZ" size="6">
	<input name="rand" type="hidden" value="<?= $a ?>" />	<!--保存猜测前产生的随机数-->
	<input name="last" type="hidden" value="<?= $b ?>" />	<!--保存剩余机会次数-->
	<input type="submit" name="sub" value="确定">
</form>

