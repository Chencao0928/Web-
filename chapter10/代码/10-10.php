<? header("Content-type: text/html; charset=utf-8"); 
require('conn.php');
$sInput = trim(unescape($_GET["sBus"])); //获得10-10.html发送来的数据
	$sResult = "";	//用来保存提示结果
		//查询以sInput开头的信息
	$sql="select routename from route where routename like '$sInput%' limit 10";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())	
 $sResult = $sResult. $row["routename"].",";		//将每条提示结果用","分隔
 
if (strlen($sResult)>0) 
$sResult=substr($sResult,0,-1);	//去掉最后的“,”号
echo $sResult;		//输出所有的提示结果
?>