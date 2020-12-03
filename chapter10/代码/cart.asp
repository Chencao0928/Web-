<!--#include file="conn.asp"-->	
<% 
response.Charset="utf-8"
id=request("id")		'获取商品id
spn=unescape(request("spn"))
spt=unescape(request("spt"))
spp=request("spp")
num=request("num")
Set rs=conn.Execute("Select * from cart where spid="&id & "and user='"& Session("user")&"'")
if not rs.eof then	'如果购物车中有这种商品

sql="update cart set num=num+"&num &" where spid="&id	'将这种商品的件数增加
conn.execute sql
response.Write id&"|"&rs("num")+num	'输出该商品的id和最新的件数
else	'如果购物车中没有这种商品

sql="insert into cart([spid],[name],[price],[num],[type],[user]) values("&id&",'"&spn&"',"&spp&","&num&",'"&spt&"','"&Session("user")&"')"
conn.execute sql		'添加商品到cart表中
response.write 1		'输出成功标志
end if

 %>
