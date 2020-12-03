<% response.Charset="gb2312"
	user=request.QueryString("user")
	comment=request.QueryString("comment")
	response.Write "<h3>评论人："&user&"</h3>"
	response.Write "<p>内容："&comment&"</p>"
%>

