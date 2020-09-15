<? $sport='basket';
$hobby="I like play $sportball.";	    //包含变量的错误方法
echo $hobby;

$hobby="I like play {$sport}ball.";    //包含变量的正确方法
$hobby="I like play $sport ball.";    //包含变量的正确方法

echo $hobby;
	?>
