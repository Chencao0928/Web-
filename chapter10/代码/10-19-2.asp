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
 if act="del" then
		id = request("id")
		conn.execute "delete from lyb where id="&id	'删除id对应的记录
'-------------------------代码段A开始---------------------------  
		rs.open "select * from lyb",conn,1,3
  do while not rs.eof 			'并重新输出记录表到客户端
 	response.Write "<tr><td width='100'>"&rs("title")&"</td>"
    response.Write "<td>"& rs("content") &"</td><td>"& rs("author") &"</td>"
    response.Write "<td>"&rs("email")&" </td><td>"&rs("ip")&" </td>"
	 response.Write "<td><a href='javascript:;'  onclick='edit1("&rs("id")&")'>编辑</a></td>"
	 response.Write "<td><a href='javascript:;'  onclick='del1("&rs("id")&")'>删除</a></td></tr>"
 rs.movenext
loop
rs.close
'-----------------------代码段A 结束-----------------------
End If	

 %>