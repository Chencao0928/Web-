<!--#include file="conn.asp"-->	
<% 	Response.CharSet = "utf-8"
 Set rs=conn.Execute("Select top 4 * From lyb")
 do while not rs.eof 
 response.Write rs("title")&"|"& rs("content") &"|"&rs("author")&"|"&rs("email")&"|"&rs("ip")
 rs.movenext
 if not rs.eof then response.Write "$"  '如果不是最后一条记录则输出“$”
loop	 %>


