<!--#include file="conn.asp"-->	
<% 
Response.CharSet = "utf-8"
Set rs=conn.Execute("Select top 4 * From lyb")%>
[<%  do while not rs.eof 	%>	
 {"title":"<%= rs("title") %>",
 "content":"<%= rs("content") %>",
 "author":"<%= rs("author") %>",
 "email":"<%= rs("email") %>",
 "ip":"<%= rs("ip") %>"}
 <% 	rs.movenext 
  	if not rs.eof then response.Write ","		'最后一条记录不输出","
loop	
%>]

