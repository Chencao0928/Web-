<% response.Charset="gb2312"
	user=unescape(request.QueryString("user"))
	comment=unescape(request.QueryString("comment"))

response.Write("{ user: '"&user&"', comment:'"&comment&"'}")	'输出JSON格式数据
%>

