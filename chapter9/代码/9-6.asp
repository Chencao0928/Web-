<% 
response.Charset="gb2312"
	user=request.QueryString("user")		'URL字符串中的数据采用GET方式传递
	comment=request.QueryString("comment")
	nick=request.form("nick")			'data参数中的数据默认采用POST方式传递
	response.Write "<h3>评论人："&user&"</h3>"
	response.Write "<p>内容："&comment&"</p>"
	response.Write "<p>签名："&nick&"</p>"
 %>
