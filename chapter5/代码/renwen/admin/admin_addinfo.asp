<!--#include file="adminconn.inc"-->
<%
  if session("aleave")="" then
      response.redirect "adminlogin.asp"
	  response.end
  end if
%>
<%
dim rs
dim sql
dim count
set rs=server.createobject("adodb.recordset")
sql = "select * from SmallClass order by SmallClassID asc"
rs.open sql,conn,1,1
%>
<script language = "JavaScript">
var onecount;
subcat = new Array();
        <%
        count = 0
        do while not rs.eof 
        %>
subcat[<%=count%>] = new Array("<%= trim(rs("SmallClassName"))%>","<%= trim(rs("BigClassName"))%>","<%= trim(rs("SmallClassName"))%>");
        <%
        count = count + 1
        rs.movenext
        loop
        rs.close
        %>
onecount=<%=count%>;

function changelocation(locationid)
    {
    document.addNEWS.SmallClassName.length = 1; 
    var locationid=locationid;
    var i;
    for (i=0;i < onecount; i++)
        {
            if (subcat[i][1] == locationid)
            { 
                document.addNEWS.SmallClassName.options[document.addNEWS.SmallClassName.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }
    }    

function CheckForm()
{
     document.addNEWS.cnWords.value = document.frames.cnEditBox.getHTML(true);     
     document.addNEWS.imageNum.value = document.frames.cnEditBox.document.all("editImageNum").value;
     document.addNEWS.editFirstImageName.value = document.frames.cnEditBox.document.all("editFirstImageName").value;

	if (document.addNEWS.title.value.length == 0) {
		alert("���ű���û����д.");
		document.addNEWS.title.focus();
		return false;
	}
		if (document.addNEWS.user.value.length == 0) {
		alert("���ŷ�����û����д");
		document.addNEWS.user.focus();
		return false;
	}
	return true;
}
</script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../css.css" type="text/css">
<title>�������</title>
</head>

<body leftmargin="0" topmargin="0" bgcolor="#FFFFEE">
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="2">
  <form name="addNEWS" method="post" action="addinfo_ok.asp" onSubmit="return CheckForm();">
    <tr> 
      <td height="30" colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr> 
      <td width="100" height="25"><font color="#FF0000">*</font>���⣺</td>
      <td width="400">
<input name="title" type="text" class="input" size="30"></td>
    </tr>
    <tr> 
      <td height="25"><font color="#FF0000">*</font>���</td>
      <td> 
        <%
        sql = "select * from BigClass"
        rs.open sql,conn,1,1
		if rs.eof and rs.bof then
			response.write "���������Ŀ��"
		else
		%>
        <select name="BigClassName" onChange="changelocation(document.addNEWS.BigClassName.options[document.addNEWS.BigClassName.selectedIndex].value)" size="1">
          <option selected value="<%=trim(rs("BigClassName"))%>"><%=trim(rs("BigClassName"))%></option>
          <%
			dim selclass
		    selclass=rs("BigClassName")
        	rs.movenext
		    do while not rs.eof
			%>
          <option value="<%=trim(rs("BigClassName"))%>"><%=trim(rs("BigClassName"))%></option>
          <%
		        rs.movenext
    	    loop
		end if
        rs.close
			%>
        </select> <select name="SmallClassName">
          <option value="" selected>��ָ��С��</option>
          <%
			sql="select * from SmallClass where BigClassName='" & selclass & "'"
			rs.open sql,conn,1,1
			if not(rs.eof and rs.bof) then
			%>
          <option value="<%=rs("SmallClassName")%>"><%=rs("SmallClassName")%></option>
          <% rs.movenext
				do while not rs.eof%>
          <option value="<%=rs("SmallClassName")%>"><%=rs("SmallClassName")%></option>
          <%
			    	rs.movenext
				loop
			end if
	        rs.close
			%>
          <%
			ranNum=int(9*rnd)+10
			iddata=month(now)&day(now)&hour(now)&minute(now)&second(now)&ranNum
			%>
        </select></td>
    </tr>
    <tr> 
      <td height="25" valign="top"><font color="#FF0000">*</font>���ݣ�</td>
      <td valign="top"> 
        <IFRAME STYLE="border: none" NAME=cnEditBox src="EditBox.asp" WIDTH=500 HEIGHT=400></IFRAME></td>
    </tr>
    
    <tr> 
      <td height="25"><font color="#FF0000">*</font>�����ˣ�</td>
      <td> 
        <input name="user" type="text" class="input" value="��������ѧϵ" size="30"></td>
    </tr>
    <tr> 
      <td height="25">�Ƿ���Ϊ��ҳ����ͼƬ��</td>
      <td> 
        <input type="radio" name="ok" value="true">
        �� 
        <input name="ok" type="radio" value="false" checked>
        �� ��<font color="#FF0000">ѡ�����ʱ��ע���������Ƿ������ͼƬ ��</font></td>
    </tr>    
    <tr> 
      <td height="30" colspan="2" align="center"> 
        <input type="submit" name="Submit" value="�ύ" class="input">
        �� 
        <input type="reset" name="Submit2" value="����" class="input"> 
        <!--��ȡEditBox������-->
        <input name=cnWords type=hidden ID="cnWords" value=""> <input name=imageNum type=hidden ID="imageNum" value="<%=mImageNum%>"> 
        <input name=editFirstImageName type=hidden ID="editFirstImageName" value=""> 
        <!--��ȡEditBox������-->
      </td>
    </tr>
  </form>
  <tr> 
    <td height="30" colspan="2" align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>