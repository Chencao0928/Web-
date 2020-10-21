<%@language=vbscript codepage=936 %>
<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim Action,BigClassName,rs,FoundErr,ErrMsg
Action=trim(Request("Action"))
BigClassName=trim(request("BigClassName"))
if Action="Add" then
	if BigClassName="" then
		FoundErr=True
		ErrMsg=ErrMsg & "<br><li>文章大类名不能为空！</li>"
	end if
	if FoundErr<>True then
		Set rs=Server.CreateObject("Adodb.RecordSet")
		rs.open "Select * From BigClass Where BigClassName='" & BigClassName & "'",conn,1,3
		if not (rs.bof and rs.EOF) then
			FoundErr=True
			ErrMsg=ErrMsg & "<br><li>文章大类“" & BigClassName & "”已经存在！</li>"
		else
    	 	rs.addnew
     		rs("BigClassName")=BigClassName
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
function checkBig()
{
  if (document.form1.BigClassName.value=="")
  {
    alert("大类名称不能为空！");
    document.form1.BigClassName.focus();
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
    <td align="center" valign="top"> <br>      
      <form name="form1" method="post" action="ClassAddBig.asp" onsubmit="return checkBig()">
        <table width="350" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#FF9900" class="border">
          <tr bgcolor="#FFE6BF" class="title"> 
            <td height="25" colspan="2" align="center"><strong>添加大类</strong></td>
          </tr>
          <tr bgcolor="#E3E3E3" class="tdbg"> 
            <td width="126" height="22" bgcolor="#FF9900"> <div align="right" class="??1">大类名称：</div></td>
            <td width="218" bgcolor="#FFE6BF"> <input name="BigClassName" type="text" size="20" maxlength="30"></td>
          </tr>
          <tr bgcolor="#C0C0C0" class="tdbg"> 
            <td height="22" align="center" bgcolor="#FF9900">&nbsp; </td>
            <td height="22" align="center" bgcolor="#FFE6BF"> <div align="left"> 
                <input name="Action" type="hidden" id="Action" value="Add">
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