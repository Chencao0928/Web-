<?	$sports=array( "网球","游泳","短跑","柔道");
for ($i=0;$i<4;$i++){
		echo $sports[$i];
		if($i==3) break;	 //最后一个元素不输出“，”，换成continue试试
		echo "，";
}	?>
