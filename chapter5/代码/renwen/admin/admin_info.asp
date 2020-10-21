<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<html>
<head>
<LINK href="../css.css" type=text/css rel=stylesheet>
<meta name="keywords" content="衡阳师范学院">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>管理新闻</title>
<style type="text/css">
<!--
.样式1 {color: #FFFFFF}
-->
</style>
</head>

<body >
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF9900">
  <tr bgcolor="#FF9900"> 
    <td width="5%" height="25" align="center"><span class="样式1">ID</span></td>
    <td width="25%" align="center"><span class="样式1">信息标题</span></td>
    <td width="10%" align="center"><span class="样式1">发布者</span></td>
    <td width="15%" align="center"><span class="样式1">所属一级分类</span></td>
    <td width="15%" align="center"><span class="样式1">所属二级分类</span></td>
    <td width="20%" align="center"><span class="样式1">发布日期</span></td>
    <td width="10%" align="center"><span class="样式1">操作</span></td>
  </tr>
  <%
page=cint(request("page"))
Set rs=Server.CreateObject("ADODB.RecordSet") 
sql="select * from NEWS order by id desc"
if request("Bigclass")<>"" then
Bigclass=request("Bigclass")
sql="select * from NEWS where BigClassName= '"&Bigclass& "' order by id desc"
end if
if request.Form("Key")<>"" then
key=trim(request.Form("Key"))
sql="select * from NEWS where title like  '%"&Key& "%' order by id desc"

end if
rs.Open sql,conn,1,1
if rs.eof and rs.bof then
response.Write("没有记录")
else
rs.PageSize=10
if page=0 then page=1 
pages=rs.pagecount
if page > pages then page=pages
rs.AbsolutePage=page  
    
for j=1 to rs.PageSize 
%>
  <tr bgcolor="#FFFFFF"> 
    <td height="22" align="center"><%=rs("id")%></td>
    <td>　
      <% if rs("imagenum")<>"0" then response.write "<img src='../images/news.gif' border=0 alt='图片新闻'>" end if %>
      <a href="../ONEWS.asp?id=<%=rs("id")%>" target="_blank" title="<%=rs("title")%>"><%=left(rs("title"),12)%></a></td>
    <td align="center"><%=left(rs("user"),5)%></td>
    <td align="center"><%=rs("BigClassName")%> </td>
    <td align="center"><%=rs("SmallClassName")%></td>
    <td align="center"><%=rs("infotime")%></td>
    <td align="center"><a href="admin_infomodi.asp?id=<%=rs("id")%>">修改</a> <a href="admin_infodel.asp?id=<%=rs("id")%>">删除</a></td>
  </tr>
  <%
rs.movenext
if rs.eof then exit for
next                                                       
%>
</table>
  
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
<form method=Post action="admin_info.asp">  
      <td height="30" align="center"> 
    <%if Page<2 then      
    response.write "首页 上一页&nbsp;"
  else
    response.write "<a href=admin_info.asp?Bigclass="&Bigclass&"&page=1>首页</a>&nbsp;"
    response.write "<a href=admin_info.asp?Bigclass="&Bigclass&"&page=" & Page-1 & ">上一页</a>&nbsp;"
  end if
  if rs.pagecount-page<1 then
    response.write "下一页 尾页"
  else
    response.write "<a href=admin_info.asp?Bigclass="&Bigclass&"&page=" & (page+1) & ">"
    response.write "下一页</a> <a href=admin_info.asp?Bigclass="&Bigclass&"&page="&rs.pagecount&">尾页</a>"
  end if
   response.write "&nbsp;页次：<strong><font color=red>"&Page&"</font>/"&rs.pagecount&"</strong>页 "
    response.write "&nbsp;共<b><font color='#FF0000'>"&rs.recordcount&"</font></b>条记录 <b>"&rs.pagesize&"</b>条记录/页"
   response.write " 转到：<input type='text' name='page' size=4 maxlength=10 class=input value="&page&">"
   response.write " <input class=input type='submit'  value=' Goto '  name='cndok'></span></p>"     
%>
      </td></form>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><form name="form1" method="post" action="?">
      查找新闻：
      <select name="Bigclass" onChange="document.form1.submit()">
        <option>请选择所属栏目</option>
		<% rs.close
		rs.open "select distinct BigClassName from news", conn
		do while not rs.eof
		 %>
		<option value="<%=rs("BigClassName")%>"><%=rs("BigClassName")%></option>
		<% rs.movenext
		loop
		 %>
      </select>
      根据标题查找 
      <input name="Key" type="text" size="16">
       <input type="submit" value="提交">
    </form>
    </td>
  </tr>
</table>
<% 
end if
rs.close
set rs=nothing
conn.close
set conn=nothing
%>

</body>
</html>