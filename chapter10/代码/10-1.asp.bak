<!--#include file="conn.asp"-->	
<% 
Response.CharSet = "utf-8"
 

Set rs=conn.Execute("Select top 4 * From lyb")
 do while not rs.eof 
 response.Write "<tr><td>"&rs("title")&"</td>"

     response.Write "<td>"&rs("content")&"</td>"
    response.Write " <td>"&rs("author") &"</td>"
     response.Write " <td>"&rs("email")&"</td>"
    response.Write "<td>"& rs("ip")&"</td></tr>"
  	 rs.movenext
loop	
%>

