<?	$citys=array( "cs"=>"��ɳ","hy"=>"����",cd=>"����",xt=>"��̶");
extract($citys); 		//$cs='��ɳ',$hy='����',$cd='����',$xt='��̶'
echo $xt; 				//�����̶
$newcitys=compact('cs','cd','xt'); 		//�ñ����������
print_r($newcitys);		//���array([cs]=>��ɳ [cd]=>���� [xt]=>��̶)	 ?>
