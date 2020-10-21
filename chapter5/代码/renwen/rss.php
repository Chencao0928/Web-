<? require('conn.php');
//设置网页编码
header('Content-type:text/xml');
//设置网页内容类型
$owen1='学生工作';
$result=$conn->query("select * from news where BigClassName='$owen1' limit 4");
if ($result)
{ 
$xmlDoc = new DOMDocument(); 
if(!file_exists("01.xml")){ 
$xmlstr = "<?xml version='1.0' encoding='utf-8' ?><rss></rss>"; 
$xmlDoc->loadXML($xmlstr); 
$xmlDoc->save("01.xml"); 
} 
else { $xmlDoc->load("01.xml");} 
$Root = $xmlDoc->documentElement;
 
while ($arr = $result->fetch_array()){ 
$node1 = $xmlDoc->createElement("id"); 
$text = $xmlDoc->createTextNode(iconv("GB2312","UTF-8",$arr["ID"])); 
$node1->appendChild($text); 
$node2 = $xmlDoc->createElement("name"); 
$text2 = $xmlDoc->createTextNode(iconv("GB2312","UTF-8",$arr["title"])); 
$node2->appendChild($text2); 
$Root->appendChild($node1); 
$Root->appendChild($node2); 
$xmlDoc->save("01.xml"); 
} 
} 




?>



