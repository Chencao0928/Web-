<%	
response.Expires=-1
Response.CharSet = "GB2312"
title=unescape(request.QueryString("title"))
response.Write title&"<br>"
'id=cint(request.QueryString("id"))			'获取URL变量id的值
'	if id=1 then
'	response.Write("<p>这是第一条新闻</p>")
'	elseif id=2 then
'	response.Write("<p>这是第二条新闻</p>")
'	elseif id=3 then
'	response.Write("<p>这是第三条新闻</p>")
'	else
'	response.Write("<p>参数非法</p>")
'	end if	%>
