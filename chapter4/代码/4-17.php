<?
setcookie('tmpcookie','这是个临时cookie');	//不设置过期时间
setcookie('userName','小泥巴',time()+60);	//设置过期时间为60秒，永久cookie
setcookie('age',21,time()+60);
setcookie('sex','女',time()+60,'','',false);		//设置setcookie的所有参数
?>
