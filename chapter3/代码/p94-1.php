<?	$citys=array( "cs"=>"长沙","hy"=>"衡阳","cd"=>"常德","xt"=>0);
	reset($citys);
do{
	echo key($citys).' => '.current($citys);}
while(next($citys)!==false); 		//不要写成while(next($citys)); 	?>
