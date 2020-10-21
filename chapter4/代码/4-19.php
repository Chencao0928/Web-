<? 
if ($_COOKIE["user"]["xm"]<>""){ 		//尝试获取指定的Cookie变量，如果有
	$visnum=intval($_COOKIE["user"]["num"])+1;		//将原来的访问次数加1
	$expire=intval($_COOKIE["user"]["expire"]);		//获取有效期
	//将本次访问时间写入Cookie
	setcookie("user[dt]",date("Y-m-d h:i:s"),time()+3600*$expire);	
	setcookie("user[num]",$visnum,time()+3600*$expire);	//将本次访问次数写入Cookie
	echo"欢迎您:".$_COOKIE["user"]["xm"];			//输出Cookie变量的值
	echo "<br/>这是您第".$visnum."次访问本网站";
	echo "<br/>您上次访问是在".$_COOKIE["user"]["dt"];
}
else			//没有Cookie则显示登录表单	
	echo '<html><body>
<div style="border:1px solid #06f; background:#bbdeff">
  <form method="post" action="4-20.php" style="margin:4px;">
    <p>帐号: <input name="xm" type="text" size="12"></p>
    <p>密码: <input name="Pwd" type="password" size="12"></p>
    <p>保存: <select name="Save">
        <option value="-1">不保存</option>
        <option value="7">保存1周</option>
        <option value="30">保存1月</option></select> 
		<input type="submit" value="登 录"></p>
  </form></div></body></html>'		?>
