<? require('conn.php');
//设置网页编码
//设置网页内容类型
$owen1='学生工作';
header('Content-type:text/xml');
$result=$conn->query("select * from news where BigClassName='$owen1' limit 4");

if ($result->num_rows>0)
{ 
$dom = new DOMDocument('1.0','UTF-8');
$dom->formatOutput=true;
$rcs = $dom->createElement("rss");

 
while ($row=$result->fetch_assoc()){
//print_r($arr); 
$rc = $dom->createElement("channel");
    $mydate=$dom->createElement("title");
    $myname = $dom->createElement("link");
   
    $mydescription=$dom->createElement("description");
	 $myhp=$dom->createElement("item");
	 $date= iconv('gbk','utf-8',$row['title']);

    $datetext = $dom->createTextNode(iconv('gbk','utf-8',$row['title']));
    $mydate->appendChild($datetext);
    $nametext=$dom->createTextNode($name);
    $myname->appendChild($nametext);
    $hptext=$dom->createTextNode($hp);
    $myhp->appendChild($hptext);
    $descriptiontext=$dom->createTextNode($description);
    $mydescription->appendChild($descriptiontext);
    $rcs->appendChild($rc);
    $rc->appendChild($mydate);
    $rc->appendChild($myname);
    $rc->appendChild($myhp);
    $rc->appendChild($mydescription);

} 
  $dom->appendChild($rcs);
     echo $dom->saveXML();     

} 




?>



