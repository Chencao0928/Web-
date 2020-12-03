<!--#include file="conn.asp"-->	
<% 		Response.CharSet = "utf-8"
Set rs=conn.Execute("Select top 4 * From lyb")
'输出以"|"隔开的字符串
response.Write rs("title")&"|"& rs("content") &"|"&rs("author")&"|"&rs("email")&"|"&rs("ip")
%>

