
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
 		url: "service.asp",
 		data: {id:id,n:Math.random()},   	//发送记录id给service.asp
  		beforeSend:function(){$(dig).html('<img src="images/Loading.gif">');}, 
		success: function(data){  	//处理返回的数据
			r=data.split(",");
			 if(r[0] == "yt" ) {  		//已经投过票的情况
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
<!--#include file="conn.asp"-->
<%	
Set rs = Server.CreateObject("Adodb.RecordSet") 	'以下为显示新闻记录的代码
	Sql = "Select * From News Order By Id Desc"
	Rs.Open Sql,Conn,1,1
	do while not rs.eof	 %>
<div class="news" style="padding:6px; border:1px solid green; margin:5px;width:450px;">
<div class="dig" style="float:right;clear:both">
	<h3 id="<%=Rs("id")%>"><%=Rs("dig")%></h3>		<!--h3是$(dig)对象-->
	<p id="dig<%=Rs("id")%>">			<!--p是$(content)对象-->
	<a href="javascript:Dig(<%=rs("id")%>);">投一票</a></p>
</div>
<div class="content" style="float:left; clear:both">
	<h3><%=Rs("Id")%> <a href="#"><%=Rs("Title")%></a></h3>
	<%=Left(Rs("Content"),30)%><br /> 作者：<%=Rs("AddName")%> 评论：
	<%=Rs("pinglun")%>条 时间：<%=Rs("AddTime")%></div>
</div> 
<% Rs.MoveNext
Loop
Rs.Close 

%>

 
</body>
</html>
