<?	$citys=array( "cs"=>"��ɳ","hy"=>"����","cd"=>"����","xt"=>0);
	reset($citys);
do{
	echo key($citys).' => '.current($citys);}
while(next($citys)!==false); 		//��Ҫд��while(next($citys)); 	?>
