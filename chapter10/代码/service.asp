<!--#include File="conn.asp"-->
<%
Dim id,Rs,Sql,dig 
id = Replace(Trim(Request.QueryString("id")),"'","")
Set Rs = Server.CreateObject("ADODB.Recordset")
	Sql = "Select * From News Where id="&id
If Session("id"&id)<>"" Then		'如果这条记录已经投过票了
	Rs.Open Sql,Conn,3,3
	If Rs.Eof And Rs.Bof Then
		Response.Write("NoData")
	Else
		Response.Write("yt"&","&rs("Dig"))
	
	End If
Else		'尚未投过票的情况
	Rs.Open Sql,Conn,1,3
	If Rs.Eof And Rs.Bof Then
		Response.Write("NoData")
	Else
		Dig =Rs("Dig")
		Dig = Dig + 1
		Rs("Dig") = Dig
		Rs.Update
		Session("id"&id) = id
		Response.Write(Dig)
	End If
End If
Rs.Close
Set Rs = Nothing
%>