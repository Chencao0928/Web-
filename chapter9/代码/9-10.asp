<!--#include file="conn.asp"-->	
<% 

Response.CharSet = "GB2312"
Response.ContentType="text/xml" '设置输出的文本为XML格式，不可省略
Response.Write "<?xml version=""1.0"" encoding=""GB2312""?>"
Response.Write "<comments>"
 Set rs=conn.Execute("Select top 4 * From lyb")
do while not rs.eof  %>
 <comment id="<%= rs("id") %>">
 <title><%= rs("title") %></title>
 <content><%= rs("content") %></content>
 <author><%= rs("author") %></author>
 </comment>
 <%  rs.movenext
loop	
%>
</comments>
<% rs.close %>

