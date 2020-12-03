<!--#include file="conn.asp"-->
<% 
Response.Charset="utf-8"
shengid=Request.QueryString("index") 		'获得$.getJSON发送来的数据
sql="select * from city where shengid="&shengid&" order by shiorder"
JSON_text= "["
set rs=server.createobject("adodb.recordset")
rs.open sql,conn,1,1 		'根据省ID查询数据表
do while not rs.eof 		'循环输出JSON格式数据
   JSON_text = JSON_text+"{ID:"&rs("shiorder")&", shi: '"&rs("shiname")&"'}"
    rs.movenext
	if not rs.eof then JSON_text = JSON_text+","	'不是最后一条记录就加","
loop
rs.close
JSON_text = JSON_text+"]"
Response.Write JSON_text
%>


