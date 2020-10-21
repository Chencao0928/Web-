<?
setcookie('userName','');				//删除Cookie的方法1
setcookie('age',21,time()-600);			//删除Cookie的方法2
setcookie('sex','女',time()-600);
var_dump($_COOKIE); 			//用来查看上述Cookie数组元素是否已经删除
?>
