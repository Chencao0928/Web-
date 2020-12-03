<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>级联下拉框示例</title>
</head>

<body>
<script src="jquery.min.js"></script>
<script>
$(function(){
	$("#szSheng").change(function(){		//左边列表框值改变时触发
		$.getJSON("10-8.php",{index: $(this).val()},		//发送列表框值给10-8.asp
			function(data){ 	//接收10-8.asp返回的数据
			var city="";	//根据返回的JSON数据，创建<option>项
			for (var i = 0; i < data.length; i++) {
			city += '<option value="' + data[i].ID + '">' + data[i].shi + '</option>';
			};
			$("#szShi").html(city);		//在第二个下拉菜单中显示数据
		});
	});	
	$("#szSheng").change();		//让页面第一次显示的时候也有数据
})
</script>
  所在城市：<select id="szSheng">
<? include('conn.php');
	$result=$conn->query("select * from province order by shengorder");
	//var_dump($result);
	while($row=$result->fetch_assoc()){   ?>	 <!--在左边列表框中加载所有省的信息-->
   <option value="<?=$row["id"] ?>" ><?=trim($row["shengname"]) ?></option>
   <? }  ?> 
	</select>
  <select id="szShi"></select>		 <!--右边列表框，用于加载市的信息-->



</body>
</html>
