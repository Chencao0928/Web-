<?
foreach($_COOKIE['user'] as $key=>$value){
	echo $key.'=>'.$value.'  ';} 		//���Cookie����������Ԫ��
	//var_dump($_COOKIE); 			���$_COOKIE�е���������
	echo  $_COOKIE['user']['name'];  	//���Cookie������һ��Ԫ��
?>
