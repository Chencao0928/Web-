
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax投票程序</title>

<script src="jquery.min.js"></script>
<script>
function Dig(id) {  	//当单击投一票链接时
	var content = document.getElementById("dig"+id);    //获取显示“投一票”的元素
  	//获取显示票数的元素，其id属性值为一个数字，类似id="3"
	var dig = document.getElementById(id);	
	$.ajax({
 		type: "get",
 		url: "service.php",
 		data: {id:id,n:Math.random()},   	//发送记录id给service.asp
  		beforeSend:function(){$(dig).html('<img src="images/Loading.gif">');}, 
		success: function(data){  	//处理返回的数据
		ndata=data.replace(/\nr/g,''); 

			r=ndata.split("|");
			//r[0]=r[0].replace(/\n/g,''); 
//			alert(typeof(r[0])+r[0]+r[1]);
			 if(r[0].indexOf("yt")!= -1 ) {  		//已经投过票的情况
                $(content).html("您已经投过票了！");
                $(dig).html(r[1]);  		//显示原来的票数
                    }					
             else if(data == "NoData")		//没有找到记录
					{	alert("参数错误！");	}
	  			else{
					$(dig).html(data);	 //服务器修改成功，更新票数
					$(content).html("投票成功");		//将投一票改成投票成功
			setTimeout("rightinfo("+id+")",3000);		//3秒后调用rightinfo(id)
                    }		}}); }
function rightinfo(id) {			//将“投票成功”还原成“查看”链接
	var content = document.getElementById("dig"+id); 
	$(content).html('<a href="shownew.asp?id=' + id + '">查看</a>');
}
</script>

</head>

<body>
<? require('conn.php');
$result=$conn->query("Select * From News Order By ID Desc");
if($result->num_rows>0) {
  while($row=$result->fetch_assoc()){  
 ?>
<div class="news" style="padding:6px; border:1px solid green; margin:5px;width:450px;">
<div class="dig" style="float:right;clear:both">
	<h3 id="<?=$row["ID"]?>"><?=$row["dig"]?></h3>		<!--h3是$(dig)对象-->
	<p id="dig<?=$row["ID"]?>">			<!--p是$(content)对象-->
	<a href="javascript:Dig(<?=$row["ID"]?>);">投一票</a></p>
</div>
<div class="content" style="float:left; clear:both">
	<h3><?=$row["ID"]?> <a href="#"><?=$row["title"]?></a></h3>
	<?=substr($row["content"],0,30)?><br /> 作者：<?=$row["addname"]?> 评论：
	<?=$row["pinglun"]?>条 时间：<?= substr($row["addtime"],0,10)?></div>
</div> 
<? }} ?>

 
</body>
</html>
