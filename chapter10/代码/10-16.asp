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
'----------------------------------代码段A开始---------------------
	rs.open "select top 4 * from lyb order by id desc",conn,1,1
  do while not rs.eof 			'重新输出更新后的记录集到客户端
  response.Write "<tr><td width='100'>"&rs("title")&"</td>"
     response.Write "<td>"& rs("content") &"</td>"
     response.Write "<td>"& rs("author") &"</td>"
     response.Write "<td width='80'>"&rs("email")&" </td>"
     response.Write "<td>"&rs("ip")&" </td></tr>"
 rs.movenext
loop
rs.close
'----------------------------------代码段A结束----------------------------------
end if
 %>
