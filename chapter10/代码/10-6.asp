<!--#include file="conn.asp"-->
<%
  Response.CharSet = "utf-8" 
  id=request.querystring("id")  '获得$.get()发送来的id
sql="Select * From link Where link_id="&id
set rs = Server.CreateObject("ADODB.recordset") 
rs.Open sql, conn 
if not rs.EOF then 
	response.write "<li>编号："&rs(0)&"</li>"
	response.write "<li>网站名："&rs(1)&"</li>"
	response.write "<li>URL地址："&rs(2)&"</li>"
	response.write "<li>介绍："&rs(3)&"</li>"
else
 response.Write "没有搜索到信息"
end if 
rs.close  
 %>

