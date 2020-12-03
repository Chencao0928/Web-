<!--#include file="conn.asp"-->
<% 
response.Charset="utf-8"
act=request("act")
if act="load" then		'如果是请求载入评论
rs.open "select top 3 * from lyb order by id desc",conn,1,1
if not(rs.bof and rs.eof) then 
do while not rs.eof 	%>
  <div style="border:1px solid #CCC;margin:5px;">
   网友：<%= rs("author") %> 发表于<%= rs("date") %><br/>
	标题：<%= rs("title") %><br/>
   <%= rs("content") %> Email：<%= rs("email") %>
  </div>
  <% rs.movenext
loop 
else	response.Write("<p>目前还没有用户留言</p>")
end if
rs.close
end if
  
if act="add" then		'如果是发表评论
   title = unescape(request("title"))	'获取$.post()方法传来的数据
	author = unescape(request("author"))
	email = unescape(request("email"))
	content = unescape(request("content"))	
'----------------------------------------------------------
	rs.open "select * from lyb order by id desc",conn,1,3		
	rs.addnew		'将数据添加到记录表中
	rs("title")=title : rs("author")=author	
	rs("email")=email:	rs("content")=content
	rs("date")=now()		
	rs.update	
	rs.close
	response.write 1	'输出评论添加成功的标志
 end if %>
