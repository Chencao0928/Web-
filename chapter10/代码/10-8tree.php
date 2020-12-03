<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jQuery折叠菜单</title>
<style type="text/css">
ul {
	list-style:none;
	margin:0;
	padding:0;		/*以上三条为无序列表的通用设置*/
}
#accordion {
	width:200px; 		/*设置折叠式菜单内容的宽度为200px*/
}
#accordion li {
border-bottom:1px solid #ED9F9F;
}
#accordion a {
	font-size: 14px;
	color:#ffffff;
	text-decoration: none;
	display:block;						/* 区块显示 */
	padding:5px 5px 5px 0.5em;
	border-left:12px solid #711515;		/* 左边的粗暗红色边框 */
	border-right:1px solid #711515;
	background-color:#c11136;
	height:1em;			/* 此条为解决IE 6的bug*/
}
#accordion a:hover {
	background-color:#990020;			/* 改变背景色 */
	color:#ffff00; 				/* 改变文字颜色为黄色 */
}
#accordion li ul li {			/* 子菜单项的样式设置 */
	border-top:1px solid #ED9F9F;
}
#accordion li ul li a{			/* 子菜单项的样式设置 */
	padding:3px 3px 3px 0.5em;
	border-left:28px solid #a71f1f;
	border-right:1px solid #711515;
	background-color:#e85070;
}
#accordion li ul li a:hover{		/* 改变子菜单项的背景色和前景色 */
	background-color:#c2425d;
	color:#ffff00;}
</style>
<script src="jquery.min.js"></script>
<script>
	$(function(){
		//对所有第一层a元素绑定单击事件
		$("#accordion > li > a").click(function(){
			var abc=$(this); 	//将$(this)对象保存到变量abc中
			$.get("10-8show.php",{index: $(this).attr("href").substr(1)},		// substr(1)用来去掉href属性值中的第1个字符，即#号
			function(data){ 	//接收7-10.asp返回的数据
				data=eval('('+ data + ')'); 	//将返回的json字符串转化为json对象
				var city="";	//根据返回的json数据，创建列表项<li>
				for (var i = 0; i < data.length; i++) {	//将返回的数据放入li元素中
					city += '<li><a href="">' + data[i].shi + '</a></li>';
				};
			$("ul",abc.parent()).html(city);		//在下级菜单ul元素中载入数据	
		});
		$(this).parent().parent().each(function(){
				$("> li > a + *",this).slideUp();  //隐蔽所有元素
				$("> li > a",this).css("backgroundImage","url(images/Lplus.gif)"); 
			});	
			$("+ *",this).slideDown();  //展开当前点击的元素
			$(this).css("backgroundImage","url(images/Lminus.gif)");  
		});	});
</script>

</head>

<body>
<ul id="accordion">	
<? include('conn.php');
	$result=$conn->query("select * from province order by shengorder limit 4");
	//var_dump($result);
	while($row=$result->fetch_assoc()){   ?>	 <!--在一级菜单中加载省的信息-->
	  
		<li>
			<a href="#<?=$row["id"] ?>"><?=trim($row["shengname"]) ?></a>
			<ul></ul>	 <!--二级菜单，用来存放市的信息-->
		</li>
		 <? }  ?> 
	</ul>

</body>
</html>
