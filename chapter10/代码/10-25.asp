<!--#include file="conn.asp"-->
<% response.Charset="utf-8" 
  act=request("act")
 	if act="del" then		 	'删除记录
	id = request("id")
	conn.execute "delete from lyb where id="&id
call fy()
End If	
   if act="list" then
  call fy()
end if  
 sub fy()
rs.open "select * from lyb order by id desc",conn,1,1
if not(rs.bof and rs.eof) then
Dim pageNo,pageS
if Request("pageNo")="" Then 
pageNo=1	'如果没有页码则显示第1页
else pageNo=cInt(request("pageNo"))
end if 
'开始分页显示记录，指向要显示的页，然后逐条显示当前的所有记录
rs.PageSize=4  '设置每页显示4条记录
pageS=rs.PageSize  'PageS变量用来控制显示当前页记录
rs.AbsolutePage=pageNo'设置当前显示第几页
do while not rs.eof and pageS>0
	response.Write "<tr><td width='100'>"&rs("title")&"</td>"
	response.Write "<td>"&rs("content") &"</td><td>"&rs("author")&"</td>"
	response.Write "<td>"&rs("email")&"</td><td>"&rs("ip") &"</td>"
	response.Write "<td><a href='javascript:;' onclick='edit1("&rs("id")&")'>编辑</a></td>"
	response.Write "<td><a href='javascript:;'  onclick='del1("&rs("id")&","&pageNo&")'>删除</a></td> </tr>"
	rs.movenext
  	pageS=pageS-1
loop
end if
Str = Str & "<div>"			'下面是显示分页链接的代码
Str = Str & "<a href='javascript:void(getweblist(1))'><<</a> "
      For i = 1 To rs.pagecount
       If i = pageNo Then
 Str = Str & "<span style='font-weight:bold;color:red;font-size:16px;'>" & i & "</span> "
       Else
       Str = Str & "<a href=javascript:void(getweblist(" & i & "))>" & i & "</a> "
      End If
     Next
Str = Str & " <a href='javascript:void(getweblist(" & rs.pagecount & "))'>>></a>"
Str = Str & "</div>"
   Response.Write Str
   end sub
%>

