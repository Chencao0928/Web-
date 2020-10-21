<%@language=vbscript codepage=936 %>
<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim BigClassID,Action,rs,NewBigClassName,OldBigClassName,FoundErr,ErrMsg
BigClassID=trim(Request("BigClassID"))
Action=trim(Request("Action"))
NewBigClassName=trim(Request("NewBigClassName"))
OldBigClassName=trim(Request("OldBigClassName"))

if BigClassID="" then
  response.Redirect("ClassManage.asp")
end if
Set rs=Server.CreateObject("Adodb.RecordSet")
rs.Open "Select * from BigClass where BigClassID=" & CLng(BigClassID),conn,1,3
if rs.Bof and rs.EOF then
	FoundErr=True
	ErrMsg=ErrMsg & "<br><li>此产品大类不存在！</li>"
else
	if Action="Modify" then
		if NewBigClassName="" then
			FoundErr=True
			ErrMsg=ErrMsg & "<br><li>产品大类名不能为空！</li>"
		end if
		if FoundErr<>True then
			rs("BigClassName")=NewBigClassName
			rs("Admin")=Admin
    	 	rs.update
			rs.Close
	     	set rs=Nothing
			if NewBigClassName<>OldBigClassName then
				conn.execute "Update SmallClass set BigClassName='" & NewBigClassName & "' where BigClassName='" & OldBigClassName & "'"
				conn.execute "Update NEWS set BigClassName='" & NewBigClassName & "' where BigClassName='" & OldBigClassName & "'"
     		end if		
			call CloseConn()
     		Response.Redirect "ClassManage.asp" 
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
<table width="80%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="top">      <form name="form1" method="post" action="ClassModifyBig.asp">
        <table width="350" border="0" align="center" cellpadding="0" cellspacing="2" class="border">
          <tr class="title"> 
            <td height="25" colspan="2" align="center" bgcolor="#999999"><strong>修改大类名称</strong></td>
          </tr>
          <tr class="tdbg"> 
            <td width="126" bgcolor="#FF9900"><div align="center"><strong>大类ID：</strong></div></td>
            <td width="204" bgcolor="#FFE6BF"><%=rs("BigClassID")%> <input name="BigClassID" type="hidden" id="BigClassID" value="<%=rs("BigClassID")%>"> 
            <input name="OldBigClassName" type="hidden" id="OldBigClassName" value="<%=rs("BigClassName")%>"></td>
          </tr>
          <tr class="tdbg"> 
            <td width="126" bgcolor="#FF9900"><div align="center"><strong>大类名称：</strong></div></td>
            <td bgcolor="#FFE6BF"> <input name="NewBigClassName" type="text" id="NewBigClassName" value="<%=rs("BigClassName")%>" size="20" maxlength="30"></td>
          </tr>
          <tr class="tdbg"> 
            <td align="center" bgcolor="#FF9900">&nbsp;</td>
            <td align="center" bgcolor="#FFE6BF"> <div align="left"> 
                <input name="Action" type="hidden" id="Action" value="Modify">
                <input name="Save" type="submit" id="Save" value=" 修 改 ">
            </div></td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
<%
	end if
end if
rs.close
set rs=nothing
%>