<!--#include file="rw2005/conn.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Ajax���������ͼƬ</title>
<style>


#target{position:absolute;display:none;z-index:2;border:5px solid #f4f4f4; width:280px;height:210px; background:#fee;}
</style>
<script>
$(function(){ 	
	$("#show a").mouseover(function(event){	//������ƶ���aԪ����ʱ
		event = event || window.event;	//����IE��FF���¼�����
		$("#target").css("display","block");	//��ʾ#target
		$("#target")[0].style.top  = document.body.scrollTop + event.clientY + 10 + "px";
		$("#target")[0].style.left = document.body.scrollLeft + event.clientX + 10 + "px";
		id=parseInt($(this).attr("title"));	//��aԪ��title�����л�ȡ��¼ID
		$.get("show.php",{id:id, n:Math.random()},
			function(data){
				$("#target").html(data);
		});		
	});
	$("#show a").mouseout(function(){		//������뿪aԪ����ʱ
	$("#target").html("<img src='loading.gif' style='margin:20px' />�������롭");
		$("#target").css("display","none");		//����#target
	});
})
</script>
</head>

<body>
 <div id="show" style="border:1px solid #CCC;margin:5px; padding:6px;"> 
<? require('conn.php');
$sql="select * from NEWS where firstImageName<>'' order by ID DESC limit 7" ;
$result=$conn->query($sql);

 while($row=$result->fetch_assoc()) { ?><!--��ʾ5������-->
<p><a href='onews.php?id=<?= $row["ID"] ?>' title='<?= $row["ID"] ?>'><?= $row["title"] ?> <?= $row["infotime"] ?></a></p>
<? }
?>
</div>
<div id="target"><img src="loading.gif" style="margin:20px" />�������롭</div>
</body>
</html>
