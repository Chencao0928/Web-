<? $history=$_COOKIE["history"];		//获取记录浏览历史的Cookies
	if ($history=="")		//如果浏览历史为空
		$path=$title;			//将当前页的标题保存到path变量中
	else
		$path=$title."/".$history;		//将当前页的标题加到浏览历史的最前面	
	//将$path保存到Cookie变量中,设置过期时间为30天
	setcookie("history",$path,time()+30*3600);	
	$arrPath=explode("/",$path);			//将$path分割成一个数组$arrPath
echo "您最近的浏览历史：<hr/>";
foreach ($arrPath as $key=>$value){
		if($key>9) break;					//只输出最近的10条
		echo ($key+1) .". ". $value ."<br/>";		//输出浏览历史
}?>
