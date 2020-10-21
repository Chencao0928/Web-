<? header("Content-type: text/html; charset=gb2312"); 
require('conn.php');
$Bigclass=unescape($_GET["Bigclass"]);	//获取10-13.html传过来的数据
$n=unescape($_GET["n"]);

 
if($n==1) {		//如果是要加载头条新闻
$sql="select * from news where BigClassName in('学生工作','德育园地','科研成果','近期工作') order by ID desc limit 1";
$result=$conn->query($sql);
$row=$result->fetch_assoc();	 
echo $row['ID'].'|'.Trimtit($row['title'],12).'|'.Trimtit(strip_tags($row['content']),40).'|'. noyear($row['infotime']);
	die();	}
$sql="select * from news where BigClassName ='$Bigclass' order by ID desc limit $n"; 
$result=$conn->query($sql);		//查询栏目中的新闻
 while($row=$result->fetch_assoc()) 
 	echo "<tr><td class='xinwen'><a href='onews.php?id=".$row['ID']."'>". Trimtit($row['title'],23)."</a></td></tr>";


?>
