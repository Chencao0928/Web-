<!--#include file="conn.asp"-->
<% response.Charset="utf-8"
act=request("act")   
   if act="add" then
   title = unescape(request("title"))	'获取$.post()方法传来的数据
	author = unescape(request("author"))
	email = unescape(request("email"))
	content = unescape(request("content"))	
	rs.open "select * from lyb order by id desc",conn,1,3		'以可写方式打开记录集
	rs.addnew		'将数据添加到记录表中
	rs("title")=title	
	rs("author")=author	
	rs("email")=email	
	rs("content")=content	
	rs.update	
	rs.close
'------------------------代码段B开始---------------------
 Response.write 1		'输出记录在服务器端已经插入成功的标记1
'----------------------代码段B结束-----------------------

end if
 %>
