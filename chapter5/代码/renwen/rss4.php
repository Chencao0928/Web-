<? require('conn.php');
//������ҳ��������Ϊxml���ǳ���Ҫ
header('Content-type:text/xml');
//���XML�ļ�ͷ��Ϣ�������ļ��汾�ͱ���
echo "<?xml version='1.0' encoding='gb2312'?>";
$owen1=$_GET["owen1"];
$owen1='ѧ������';
$result=$conn->query("select * from news where BigClassName='".$owen1."' limit 4");
if ($result->num_rows>0){
?>
<rss version="2.0">
<channel>
<title><![CDATA[<?= $owen1 ?>]]></title>
<link>http://localhost/renwen/otype.php?owen1=<![CDATA[<?= $owen1 ?>]]></link>
<description><![CDATA[<?= $owen1 ?>]]></description>
<?  while ($row=$result->fetch_assoc()){ ?>	
<item>
  <title><![CDATA[<?=Trimtit($row['title'],24)?>]]></title>
  <link>http://localhost/renwen/onews.php?id=<?= $row['ID'] ?></link>
  <author><![CDATA[<?= $row['user'] ?>]]></author>
  <pubDate><?= notime($row['infotime']) ?></pubDate>
<description><![CDATA[<?= strip_tags($row['content']) ?>]]></description>
</item>
 <? }} ?>
</channel>
</rss>