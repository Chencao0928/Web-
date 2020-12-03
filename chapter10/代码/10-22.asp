<!--#include file="conn.asp"-->
<% response.Charset="utf-8" 
  act=request("act")
 if act="save" then
   pagesize= Request("pagesize")
  ' response.Write "<div>"&pagesize&"</div>"
session("page") = pagesize	'将每页显示的记录数保存到Session变量中
end if  
  if act="list" then
rs.open "select * from lyb order by id desc",conn,1,1
if not(rs.bof and rs.eof) then
Dim pageNo,pageS
if Request("pageNo")="" Then
 pageNo=1
else pageNo=cInt(request("pageNo"))
end if 
'开始分页显示,指向要显示的页,然后逐条显示当前的所有记录

If session("page") = "" Then session("page") = 4
rs.PageSize=session("page") '设置每页显示两条记录
pageS=rs.PageSize  'PageS变量用来控制显示当前页记录
rs.AbsolutePage=pageNo'设置当前显示第几页

do while not rs.eof and pageS>0
 response.Write "<tr><td width='100'>"&rs("title")&"</td>"
     response.Write "<td>"&rs("content") &"</td><td>"&rs("author")&"</td>"
    response.Write "<td width='80'>"&rs("email")&"</td><td>"&rs("ip") &"</td>"
		response.Write "<td><a onclick='edit1("&rs("id")&")'>编辑</a></td>"
	response.Write "<td>删除</td>  </tr>"
rs.movenext
  pageS=pageS-1
loop
end if
Str = Str & "<div>"
        Str = Str & "<a href='javascript:void(getweblist(1))'><<</a> "
        For i = 1 To rs.pagecount
            If i = pageNo Then
                Str = Str & "<b style='color:red;font-size:16px;'>" & i & "</b> "
            Else
                Str = Str & "<a href=javascript:getweblist(" & i & ")>" & i & "</a> "
            End If
        Next
        Str = Str & " <a href='javascript:getweblist(" & rs.pagecount & ")'>>></a>"
        Str = Str & "</div>"
   Response.Write Str		'输出分页链接
end if

 %>

