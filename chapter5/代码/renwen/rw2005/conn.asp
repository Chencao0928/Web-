<?
Set conn=Server.CreateObject("ADODB.Connection")
connstr="DRIVER={Microsoft Access Driver (*.mdb)};DBQ="&server.MapPath("rwdata1\renwen1.mdb")

conn.open connstr
?>
