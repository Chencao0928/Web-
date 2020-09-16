<?	$citys=array( "cs"=>"³¤É³","hy"=>"ºâÑô",cd=>"³£µÂ",xt=>"ÏæÌ¶");
echo key($citys).' '.current($citys).' '.next($citys).' '.next($citys).'<br>';
echo  prev($citys).' '.end($citys).' '.reset($citys).'<br>';
print_r (each($citys)).'<br>'; 		?>
