<% response.Charset="gb2312"
'user=decodeURIComponent(request.QueryString("user"))
'comment=decodeURIComponent(request.QueryString("comment"))
user=unescape(request("user"))
comment=unescape(request("comment"))
'nick=request.form("nick")'发送的参数默认会采用POST方式传递
for i=1 to 10000000 : next '用于延时，以看到正在载入的图标
response.Write "<h3>评论人："&user&"</h3>"
response.Write "<p>内容："&comment&"</p>"
'response.Write("{ user: '"&user&"', comment:'"&comment&"'}")'输出JSON格式数据
'response.Write "<p>签名："&nick&"</p>"
 %>
