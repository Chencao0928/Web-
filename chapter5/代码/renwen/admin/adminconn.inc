<%
StrSQL="DBQ="+server.mappath("../rwdata1/renwen1.mdb")+";DRIVER={Microsoft Access Driver (*.mdb)};"
set conn=server.createobject("ADODB.CONNECTION")
conn.open StrSQL
sub CloseConn()
	conn.close
	set conn=nothing
end sub
function decrypt(dcode)	
dim texts
dim i
for i=1 to len(dcode)
texts=texts & chr(asc(mid(dcode,i,2))-i)
next
decrypt=texts
end function
function encrypt(ecode)
Dim texts
dim i
for i=1 to len(ecode)
texts=texts & chr(asc(mid(ecode,i,2))+i)
next
encrypt = texts
end function
%>