<?	$citys=array( "cs"=>"长沙","hy"=>"衡阳",cd=>"常德",xt=>"湘潭");
extract($citys); 		//$cs='长沙',$hy='衡阳',$cd='常德',$xt='湘潭'
echo $xt; 				//输出湘潭
$newcitys=compact('cs','cd','xt'); 		//用变量组成数组
print_r($newcitys);		//输出array([cs]=>长沙 [cd]=>常德 [xt]=>湘潭)	 ?>
