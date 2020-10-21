<?
foreach($_COOKIE['user'] as $key=>$value){
	echo $key.'=>'.$value.'  ';} 		//输出Cookie数组中所有元素
	//var_dump($_COOKIE); 			输出$_COOKIE中的所有内容
	echo  $_COOKIE['user']['name'];  	//输出Cookie数组中一个元素
?>
