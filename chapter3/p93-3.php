<?	$citys=array( "cs"=>"��ɳ","hy"=>"����",cd=>"����",xt=>"��̶");
echo key($citys).' '.current($citys).' '.next($citys).' '.next($citys).'<br>';
echo  prev($citys).' '.end($citys).' '.reset($citys).'<br>';
print_r (each($citys)).'<br>'; 		?>
