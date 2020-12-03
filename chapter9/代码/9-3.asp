<% 

response.Expires=-1	'防止从浏览器缓存中取页面，也可删除 
response.Write "<b>Hello Ajax!</b>" & time()
 %>