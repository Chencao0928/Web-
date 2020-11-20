<?php
	ob_start();
?>

<?php
	$path=$_GET["path"];
	header("location:newslist/$path");
?>