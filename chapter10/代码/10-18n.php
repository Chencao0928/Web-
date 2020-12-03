<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax编辑和删除记录</title><br />
<style>
#editbox{
	width:402px;
	/*height:200px;*/
z-index:999;
	background:silver;
	position:absolute;
	top:180px;
	left:200px;
	border:1px #CCCCCC solid;
	display:none;
	/*filter:dropshadow(color=#666666,offx=3,offy=3,positive=2); */
   }
</style>
<script src="jquery.min.js"></script>
<script type="text/javascript">

function edit1(id)				//获取要修改的记录并回显在编辑框中
{  
    $.post("10-19.php",{id:id,act:"edit"},
	function(data)
	{ 	
	    str=data.split("|");			//将服务器返回的数据进行切分
		str0=' <table width="400" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333"><form name="form1"><tbody bgcolor="#ffffff"><tr><td width="125">留言主题：</td>  <td width="275"><input type="text" id="title" value="'+str[1]+'"></td></tr> <tr>  <td>留言人：</td> <td><input type="text" id="author" value="'+str[2]+'"></td> </tr> <tr><td>联系方式：</td><td><input type="text" id="email" value="'+str[3]+'"></td></tr><tr><td>留言内容：</td><td><textarea id="content" cols="30" rows="3">'+str[4]+'</textarea></td></tr><tr><td></td><td><input type="button" id="Submit" value="修 改" onClick="javascript:modify1('+str[0]+');"> <input name="reset" type="reset" id="reset" value="关闭" onClick="javascript:close2();"/></td></tr></tbody></form></table>';		
		// document.getElementById("editbox").innerHTML=str0;
		$("#editbox").html(str0);
		$("#editbox").fadeIn(300);			//以渐现方式显示弹出框
	}    );   
} 
function close2()
{
    $("#editbox").css("display","none");
}
function modify1(id)	{   	//发送用户输入的数据供服务器端修改记录
       title=$("#title").val();	//获取用户在表单中输入的内容
		author=$("#author").val(); 
		  email=$("#email").val(); 
		   content=$("#content").val(); 
    $.post("10-19.php",{
		   title:escape(title),
		   id:id,
		   author:escape(author),
		   email:escape(email),
		   content:escape(content),
		   act:"modify"
	   },
		  function(data){ 	   
	      	if(data==1)		  {
		  	  kk="fff"+id;		 	
		s=document.getElementById(kk).firstChild; //该行中的第1个单元格
			   while (!s.tagName) {s=s.nextSibling; }
		s.innerHTML=title;				   
			   s=s.nextSibling; 	//该行中的第2个单元格
			      while (!s.tagName) {s=s.nextSibling; }
			   s.innerHTML=content;			   
			   s=s.nextSibling;
			      while (!s.tagName) {s=s.nextSibling; }
			   s.innerHTML=author;	
			   s=s.nextSibling;
			      while (!s.tagName) {s=s.nextSibling; }
			   s.innerHTML=email; 
		  }   close2();   }
   ); 
  }
//----------添加到10-18.asp中的代码（10-18p.asp）-----------  
  function del1(id)	{
    $.get("10-19.php",{id:id,act:"del"},
	function(data)
	{ 	
	    if(data==2) 	//如果服务器端删除成功
		  {	    kk="fff"+id;
			   s=document.getElementById(kk); 	//找到被删除记录对应的表格行
			   $(s).remove();		//使用jQuery的remove()方法删除该tr元素
			   } }
  );   
}
function del2(){		//单击“删除”按钮时执行
var delsel=new Array();		//定义数组delsel
$(":checkbox:checked").each(function(){		//对每个被选中的复选框
		delsel[delsel.length]=this.value;	//将选中记录的id值保存到数组中
	});
idstr=delsel.join();			//将数组delsel转换成字符串
$.get("10-19n.php",{id:idstr,act:"mutidel"},	//选中的记录id组成的字符串给7-24.asp
	function(data)	{ 	
	    if(data==1)  {
			for (i in delsel){	//对每个数组中保存的记录id值
		    kk="fff"+delsel[i];			   	
			   s=document.getElementById(kk); 	//被删除的记录对应的行
			   $(s).remove(); 		//删除行
			} } 	} );   	
}

  </script>  


</head>

<body>
<? require('conn.php');
$result=$conn->query("select * from lyb");
if($result->num_rows>0) {
 ?>
<table align="center" border="1">
  <tr bgcolor="#e0e0e0">
    <th>标题</th><th width="100">内容</th><th width="60">作者</th>
    <th>email</th><th width="80">来自</th><th>编辑</th><th>删除</th>
  </tr><tbody id="make">
  <?    while($row=$result->fetch_assoc()){  
  //$id=intval($row["id"])+0;
  ?> 

  <tr id="fff<?= $row['ID'] ?>">
    <td width="100"><?=$row["title"] ?></td>
    <td><?=$row["content"] ?></td>
    <td><?=$row["author"] ?></td>
    <td width="80"><?=$row["email"] ?></td>
    <td><?=$row["ip"] ?> </td>
		<td><a href="javascript:;"  onclick="edit1(<?=$row["ID"] ?>)">编辑</a></td>
		<td><input type="checkbox" name="sel" value="<?= $row['ID'] ?>"></td>
	 </tr>
  <? } ?>
  <tr bgcolor="#E0E0E0">	<td></td><td></td><td></td><td></td><td></td>
	<td><input type="button" value="删 除" onclick="del2()"></td></tr>
</tbody></table>
<? }
else echo "<p>目前还没有用户留言</p>";
?><br/>
<div id="editbox"></div>

</body>
</html>
