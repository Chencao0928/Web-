<?  session_start();	?>
<!--注意：运行该文件时必须手工在文件名后加?id=n ，如http://localhost/ch10/shop.asp?id=3-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>jQuery实现购物车</title>

<style>

</style>

<script src="jquery.min.js"></script>
<script>
$(function(){	
$("#order").click(function(){		//当单击放入购物车按钮时
$.get("cart.php",{id:$("#spid").val(),spn:escape($("#spn").text()),spt:escape($("#spt").text()),spp:$("#spp").text(),num:$("#num").val(),sid:Math.random()},		//发送商品信息给cart.asp
function(data){ 
	if(data==1){		//如果购物车中没有这件商品
var newsp="<div id='fff"+$("#spid").val()+"'>"+$("#spn").text()+"<br />"+$("#spt").text()+ "<br/> <b>"+$("#spp").text()+"</b><br/> <b>"+$("#num").val()+"</b></div>";
$("#cart").prepend(newsp);		//将新商品插入到购物车中
}
	else		{	alert(data);	//如果购物车中已经有这件商品
		str=data.split("|");			//得到商品id和数量
		kk="fff"+str[1];	
		alert(kk);	  	//获取商品div的id
		s=document.getElementById(kk); 
		$(s).find("b").eq(1).text(str[0]);	  	//修改该商品的数量
}
var s=0,n=0;	  	//计算商品总价和商品总数量
$("#cart").children().each(function(){  	//对购物车中的每件商品
p=parseInt($(this).find("b").eq(0).text());  	//每件商品的单价
y=parseInt($(this).find("b").eq(1).text()); 	//每件商品的数量
s=s+y*p;			n=n+y;
});
$("#pric").html(n+"件商品<br>共计"+s+"元");
});		});
})
</script>


</head>
<body>
<? require('conn.php');
$id=$_GET["id"];	//从URL字符串获取商品的id，因此必须手工添加url字符串
$_SESSION["user"]="tang";		//本来应从Session中获取登录用户的用户名，这里直接设置

$result=$conn->query("select * from shop where id=$id");		//显示某件商品的代码
$row=$result->fetch_assoc();
?>
<table width="200" border="1" cellspacing="0" cellpadding="0" style="float:left">
  <tr><td id="spn"><?= $row["name"] ?></td>
  </tr>
  <tr><td><img src="images/<?= $row["img"] ?>"/></td>
  </tr>
  <tr><td>类型：<b id="spt"><?= $row["type"] ?></b></td>
  </tr>
  <tr><td>价格：<b id="spp"><?= $row["price"] ?></b> &nbsp;
  数量：<input type="text" value="1" id="num" size="2" style="text-align:right;"/>件</td>
  </tr>
   <tr><td><input type="image" src="images/cart.png" id="order"/>
   <input type="hidden" id="spid" value="<?= $row["id"] ?>"/></td></tr>
</table>
<p style="float:left">您购物车中的商品有</p><br />
<div style=" width:200;border:1px solid gray; background:#fee;height:200;float:left;margin:5px" id="cart">		<!--该div表示购物车-->
<? $result=$conn->query("Select * from cart where user='".$_SESSION["user"]."' order by id desc");		

if($result->num_rows>0) {
  while($row=$result->fetch_assoc()){  ?> <!--循环输出购物车中的商品-->
 <div id="fff<?= $row["spid"] ?>" style="border-bottom:1px dashed red;">
 商品名：<?= $row["name"] ?><br />类型：<?= $row["type"] ?><br />
 价格：<b><?= $row["price"] ?></b><br />数量：<b><?= $row["num"] ?></b>
</div>
<? } }

else echo '当前购物车为空'; ?>

</div>
<div style=" width:200;border:1px solid gray; background:#fee;height:200;float:left;margin:5px" id="pric"></div>
</body>
</html>
