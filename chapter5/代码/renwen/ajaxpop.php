
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Ajax弹出框加载图片</title>
<style>

#demo img{width:90px;height:90px;border:5px solid #f4f4f4}
#target{position:absolute;z-index:2;border:5px solid #f4f4f4}
</style>

</head>

<body>
<script>
function showinfo(id){
$.get("show.php",{id:id, n:Math.random()},
function(data){
$("#target").html(data);
});
}
</script>
 <div style="border:1px solid #CCC;margin:5px; padding:6px;"> 
<? require('conn.php');
$sql="select * from NEWS where firstImageName<>'' order by ID DESC limit 7" ;
$result=$conn->query($sql);

 while($row=$result->fetch_assoc()) { ?><!--显示5条新闻-->
<p><a href='ONEWS.php?id=<?= $row["ID"] ?>' onmouseover='showinfo(<?= $row["ID"] ?>)'><?= $row["title"] ?> <?= $row["infotime"] ?></a></p>
<? }
?>
</div>
<div id="target"><img src="loading.gif" style="margin:20px" />正在载入…</div>
</body>
</html>
