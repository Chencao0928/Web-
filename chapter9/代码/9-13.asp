<% response.Charset="gb2312"
	user=unescape(request.Form("user"))
	comment=unescape(request.Form("comment"))

response.Write("{ user: '"&user&"', comment:'"&comment&"'}")	'输出JSON格式数据
%>

