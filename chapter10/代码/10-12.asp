<!--#include file="conn.asp"-->
<% 
Response.CacheControl = "no-cache"	'防止IE缓存页面
response.Charset = "utf-8"
if request("action")="outlogin" then	'如果点击了注销按钮
	session("adminid")=""	'清空Session变量
	session("adminlogin")=""
		call loginno()
else
	adminid=request("name")		'获取用户名
	adminpws=request("pass")

if adminid="" then		'如果获取不到用户名
	if session("adminlogin")="ok" then		'但是Session变量不为空
		call loginok()		'显示登录成功界面
	else
		call loginno()			'显示未登录界面
	end if
else		'获取到的用户名不为空
	set rs=Server.CreateObject("ADODB.RecordSet")
	Sql = "select * from admin where user='" & adminid & "' and password='" & adminpws & "'"
	rs.open Sql,Conn			'对用户名和密码进行查询
	if rs.eof then		'如果查询不到
		response.Write("用户名或者密码错误<br><input onclick='javascript:loadlogin();' type='button' name='ok' value='返回登录' />")
	else			'否则就表明查询得到，登录成功
		session("adminid")=rs("user")		'登录成功，设置Session变量
		session("adminlogin")="ok"
		call loginok()		'显示登录成功界面
	end if
	rs.close
end if
end if
Function loginok()		'输出登录成功的界面代码
	response.Write "欢迎您,"&session("adminid")&"<br><input onclick='javascript:outlogin();' type='button' name='ok' value='注销' />"
End function
Function loginno()		'输出未登录的界面代码
	response.Write("<form style='padding:0px; margin:0px;' name='form'><div id='sitename'>用户名：<input style='WIDTH: 70px' id='name' /></div><div id='siteurl'>密  &nbsp;码：<input id='pass' type='password' style='WIDTH: 70px' /></div><div id='sitesub'><input onclick='javascript:login();' type='button' name='ok' value='登录' /></div></form>")
End function
%>
