<!--#include file="conn.asp"-->
<% 
response.Charset="utf-8"
act=request("act")  
 id=request("id")


   if act="edit" then		'显示记录中原有的内容到编辑表单中
    sql="select * from lyb where id="&id&" order by id desc" 
	rs.open sql,conn,1,1
	If not rs.eof Then

	   id = rs("id")
	   title= rs("title")
		author = rs("author")
		email = trim(rs("email"))		
		content = trim(rs("content"))		
	
		
		response.write id&"|"&title&"|"&author&"|"&email&"|"&content
	
	End If
	rs.close
 end if
 
    if act="modify" then	'修改数据表中的相关数据，完成在服务器端的修改
	id = request("id")
	   title= unescape(request("title"))
		author = unescape(request("author"))
		email = unescape(trim(request("email")))		
		content = unescape(trim(request("content"))	)	
	sql="select * from lyb where id="&id&" order by id desc" 
	rs.open sql,conn,1,3
	rs("title")=title	
	rs("author")=author	
	rs("email")=email	
	rs("content")=content		
	rs.update	
	rs.close

	response.write 1'输出1通知客户端记录已修改成功
		End If
 
 '--------添加到10-19.asp中的代码（10-19p.asp）--------------
 if act="del" then		'删除记录	
	id = request("id")

	 sql="delete from lyb where id in ("&id&")"
   conn.execute sql   
response.write 1
		End If
 %>