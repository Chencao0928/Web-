<!--#include file="conn.asp"-->
<% response.Charset="utf-8"
username=request("username"): password=request("password")
act=request("act")
if act="login" then		'处理单击“注册”按钮的代码
sql="insert into admin([user],[password]) values('"&username&"','"&password&"')"
conn.execute sql
response.write "欢迎"&username&", 注册成功"
response.End
end if
sql="select * from admin where user='"&username&"'"	'处理检测用户名的代码
rs.open sql,conn,1,1
If rs.eof Then response.write 1		'如果没有记录则输出1，表示可以注册
rs.close 	%>

