<!--#include file="conn.asp"-->
<% 
response.Charset="utf-8"
sInput = trim(unescape(request("sBus")))
	sResult = ""	'用来保存提示结果
	set rs=server.createobject("adodb.recordset")
		'查询以sInput开头的信息
	sql="select top 10 routename from route where routename like '"&sInput&"%'"
	rs.open sql,conn,1,1
	do while not rs.eof
 sResult = sResult & rs("routename")&","	'将每条提示结果用","分隔
    rs.movenext
loop
if len(sResult)>0 then sResult=left(sResult,len(sResult)-1)	'去掉最后的“,”号
response.Write sResult		'输出所有的提示结果
%>

