<!--#include file="adminconn.inc"-->
<%
set rs=server.CreateObject("ADODB.RecordSet")
rs.open "delete * from NEWS where id="&request.QueryString("id"),conn,1
set rs=nothing
response.write "<script language='javascript'>" & chr(13)
		response.write "alert('³É¹¦É¾³ý£¡');" & Chr(13)
		response.write "window.document.location.href='admin_info.asp';"&Chr(13)
		response.write "</script>" & Chr(13)
Response.End
%>