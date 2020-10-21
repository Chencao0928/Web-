<? 	ob_start(); 	 //打开缓冲区，以便在有输出后还能设置Cookie
$title="水浒传"	 //商品页有很多，其他商品页的title是水浒传、西游记等 ?>
<html><head>
		<title><?= $title ?></title>	</head>
<body>	<h3 align="center"><?= $title ?>商品页面</h3>
<p>同类商品：<a href="hlm.php">红楼梦</a> <a href="4-21.php">西游记</a> 
<a href="sg.php">三国演义</a></p>
<? require("4-22.php") ?>
</body></html>
