<?	$a =date(G);		//获取当前时间的小时数
$a=floor($a/3);	//将小时数除以4并取底
switch ($a)	{
		case 2:echo "早上好";break;
		case 3:echo "上午好";break;
		case 4:case 5: echo "下午好";break;
		case 6:echo "晚上好";break;
		default: echo "该睡觉了";break;
}	?>
