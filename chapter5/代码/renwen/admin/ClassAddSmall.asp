<%@language=vbscript codepage=936 %>
<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim Action,BigClassName,SmallClassName,rs,FoundErr,ErrMsg
Action=trim(Request("Action"))
BigClassName=trim(request("BigClassName"))
SmallClassName=trim(request("SmallClassName"))
if Action="Add" then
	if BigClassName="" then
		FoundErr=True
		ErrMsg=ErrMsg & "<br><li>文章大类名不能为空！</li>"
	end if
	if SmallClassName="" then
		FoundErr=True
		ErrMsg=ErrMsg & "<br><li>文章小类名不能为空！</li>"
	end if
	if FoundErr<>True then
		Set rs=Server.CreateObject("Adodb.RecordSet")
		rs.open "Select * From SmallClass Where BigClassName='" & BigClassName & "' AND SmallClassName='" & SmallClassName & "'",conn,1,3
		if not rs.EOF then
			FoundErr=True
			ErrMsg=ErrMsg & "<br><li>“" & BigClassName & "”中已经存在文章小类“" & SmallClassName & "”！</li>"
		else
     		rs.addnew
			rs("BigClassName")=BigClassName
    	 	rs("SmallClassName")=SmallClassName
     		rs.update
	     	rs.Close
    	 	set rs=Nothing
     		call CloseConn()
			Response.Redirect "ClassManage.asp"  
		end if
	end if
end if
if FoundErr=True then
	call WriteErrMsg()
else
%>
<script language="JavaScript" type="text/JavaScript">
function checkSmall()
{
  if (document.form2.BigClassName.value=="")
  {
    alert("请先添加大类名称！");
	document.form1.BigClassName.focus();
	return false;
  }

  if (document.form2.SmallClassName.value=="")
  {
    alert("小类名称不能为空！");
	document.form2.SmallClassName.focus();
	return false;
  }
}
</script>
<LINK href="../css.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
.??1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<table width="80%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="top">  <form name="form2" method="post" action="ClassAddSmall.asp" onsubmit="return checkSmall()">
        <table width="350" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#FF9900" class="border">
          <tr bgcolor="#FFE6BF" class="title"> 
            <td height="25" colspan="2" align="center"><strong>添加小类</strong></td>
          </tr>
          <tr class="tdbg"> 
            <td width="126" height="22" bgcolor="#FF9900"><span class="??1">所属大类：</span></td>
            <td width="218" bgcolor="#FFE6BF"> <select name="BigClassName">
                <%
	dim rsBigClass
	set rsBigClass=server.CreateObject("adodb.recordset")
	rsBigClass.open "Select * From BigClass",conn,1,1
	if rsBigClass.bof and rsBigClass.bof then
		response.write "<option>请先添加文章大类</option>"
	else
		do while not rsBigClass.eof
			if rsBigClass("BigClassName")=BigClassName then
				response.write "<option value='"& rsBigClass("BigClassName") & "' selected>" & rsBigClass("BigClassName") & "</option>"
			else
				response.write "<option value='"& rsBigClass("BigClassName") & "'>" & rsBigClass("BigClassName") & "</option>"
			end if
			rsBigClass.movenext
		loop
	end if
	rsBigClass.close
	set rsBigClass=nothing
	%>
              </select></td>
          </tr>
          <tr class="tdbg"> 
            <td width="126" height="22" bgcolor="#FF9900"><span class="??1">小类名称：</span></td>
            <td bgcolor="#FFE6BF"> <input name="SmallClassName" type="text" size="20" maxlength="30"></td>
          </tr>
          <tr class="tdbg"> 
            <td height="22" align="center" bgcolor="#FF9900">&nbsp; </td>
            <td height="22" align="center" bgcolor="#FFE6BF"> <div align="left"> 
                <input name="Action" type="hidden" id="Action3" value="Add">
                <input name="Add" type="submit" value=" 添 加 ">
              </div></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<%
end if
%>