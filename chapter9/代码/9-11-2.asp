<% response.Charset="gb2312"
	user=unescape(request.QueryString("user"))
	comment=unescape(request.QueryString("comment"))

	response.Write "<h3>评论人："&user&"</h3>"
	response.Write "<p>内容："&comment&"</p>"
%>

