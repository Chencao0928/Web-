<!--#include file="rw2005/conn.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Ajax弹出框加载图片</title>
<style>


#target{position:absolute;display:none;z-index:2;border:5px solid #f4f4f4; width:280px;height:210px; background:#fee;}
</style>
<script>
$(function(){ 	
	$("#show a").mouseover(function(event){	//当鼠标移动到a元素上时
		event = event || window.event;	//兼容IE和FF的事件对象
		$("#target").css("display","block");	//显示#target
		$("#target")[0].style.top  = document.body.scrollTop + event.clientY + 10 + "px";
		$("#target")[0].style.left = document.body.scrollLeft + event.clientX + 10 + "px";
		id=parseInt($(this).attr("title"));	//从a元素title属性中获取记录ID
		$.get("show.php",{id:id, n:Math.random()},
			function(data){
				$("#target").html(data);
		});		
	});
	$("#show a").mouseout(function(){		//当鼠标离开a元素上时
	$("#target").html("<img src='loading.gif' style='margin:20px' />正在载入…");
		$("#target").css("display","none");		//隐藏#target
	});
})
</script>
</head>

<body>
 <div id="show" style="border:1px solid #CCC;margin:5px; padding:6px;"> 
<? require('conn.php');
$sql="select * from NEWS where firstImageName<>'' order by ID DESC limit 7" ;
$result=$conn->query($sql);

 while($row=$result->fetch_assoc()) { ?><!--显示5条新闻-->
<p><a href='onews.php?id=<?= $row["ID"] ?>' title='<?= $row["ID"] ?>'><?= $row["title"] ?> <?= $row["infotime"] ?></a></p>
<? }
?>
</div>
<div id="target"><img src="loading.gif" style="margin:20px" />正在载入…</div>
</body>
</html>
