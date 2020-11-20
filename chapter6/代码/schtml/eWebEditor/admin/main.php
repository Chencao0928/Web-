<?php
/*
*######################################
* eWebEditor v3.80 - Advanced online web based WYSIWYG HTML editor.
* Copyright (c) 2003-2006 eWebSoft.com
*
* For further information go to http://www.ewebsoft.com/
* This copyright notice MUST stay intact for use.
*######################################
*/
?>

<?php

require("private.php");

$sPosition = $sPosition."��̨������ҳ";

eWebEditor_Header();
eWebEditor_Content();
eWebEditor_Footer();


function eWebEditor_Content(){
	?>

	<table border=0 cellspacing=1 align=center class=navi>
	<tr><th><?=$GLOBALS["sPosition"]?></th></tr>
	</table>

	<br>

	<table border=0 cellspacing=1 align=center class=list>
	<tr><th colspan=2>eWebEditor 3.8 ��Ȩ��������ϵ����������֧��</th></tr>
	<tr>
		<td width="15%">����汾��</td>
		<td width="85%">eWebEditor Version 3.8 ��������רҵ��</td>
	</tr>
	<tr>
		<td width="15%">��Ȩ���У�</td>
		<td width="85%"><a href="http://www.ewebsoft.com" target="_blank">eWebSoft.com</a>&nbsp;&nbsp;�ѻ�ù��Ұ�Ȩ�ְ䷢�ġ�������������Ȩ�Ǽ�֤�顷,�ǼǺ�:2004SR06549</td>
	</tr>
	<tr>
		<td width="15%">����������</td>
		<td width="85%">eWeb�����Ŷ�</td>
	</tr>
	<tr>
		<td width="15%">��ҳ��ַ��</td>
		<td width="85%"><a href="http://www.eWebSoft.com" target=_blank>http://www.eWebSoft.com</a>&nbsp;&nbsp;&nbsp;<a href="http://www.webasp.net" target=_blank>http://www.webasp.net</a></td>
	</tr>
	<tr>
		<td width="15%">��Ʒ���ܣ�</td>
		<td width="85%"><a href="http://www.eWebEditor.net" target=_blank>http://www.eWebEditor.net</a></td>
	</tr>
	<tr>
		<td width="15%">��̳��ַ��</td>
		<td width="85%"><a href="http://bbs.webasp.net" target=_blank>http://bbs.webasp.net</a></td>
	</tr>
	<tr>
		<td width="15%">��ϵ��ʽ��</td>
		<td width="85%">OICQ:589808&nbsp;&nbsp;&nbsp;&nbsp;Email:<a href="mailto:service@ewebsoft.com">service@ewebsoft.com</a></td>
	</tr>
	</table>

	<br>

	<table border=0 cellspacing=1 align=center class=list>
	<tr><th colspan=2>���������йز���</th><th colspan=2>���֧���йز���</th></tr>
	<tr>
		<td width="15%">����������</td>
		<td width="45%"><?=$_SERVER["SERVER_NAME"]?></td>
		<td width="20%">mysql���ݿ⣺</td>
		<td width="20%"><?=showResult(function_exists("mysql_close"))?></td>
	</tr>
	<tr>
		<td width="15%">������IP��</td>
		<td width="45%"><?=$_SERVER["LOCAL_ADDR"]?></td>
		<td width="20%">odbc���ݿ⣺</td>
		<td width="20%"><?=showResult(function_exists("odbc_close"))?></td>
	</tr>
	<tr>
		<td width="15%">�������˿ڣ�</td>
		<td width="45%"><?=$_SERVER["SERVER_PORT"]?></td>
		<td width="20%"> SQL Server���ݿ⣺</td>
		<td width="20%"><?=showResult(function_exists("mssql_close"))?></td>
	</tr>
	<tr>
		<td width="15%">������ʱ�䣺</td>
		<td width="45%"><?=date("Y��m��d��H��i��s��")?></td>
		<td width="20%">msql���ݿ⣺</td>
		<td width="20%"><?=showResult(function_exists("msql_close"))?></td>
	</tr>
	<tr>
		<td width="15%">PHP�汾��</td>
		<td width="45%"><?=PHP_VERSION?></td>
		<td width="20%">SMTP��</td>
		<td width="20%"><?=showResult(get_magic_quotes_gpc("smtp"))?></td>
	</tr>
	<tr>
		<td width="15%">WEB�������汾��</td>
		<td width="45%"><?=$_SERVER["SERVER_SOFTWARE"]?></td>
		<td width="20%">ͼ�δ��� GD Library��</td>
		<td width="20%"><?=showResult(function_exists("imageline"))?></td>
	</tr>

	<tr>
		<td width="15%">����������ϵͳ��</td>
		<td width="45%"><?=PHP_OS?></td>
		<td width="20%">XML��</td>
		<td width="20%"><?=showResult(get_magic_quotes_gpc("XML Support"))?></td>
	</tr>
	<tr>
		<td width="15%">�ű���ʱʱ�䣺</td>
		<td width="45%"><?=get_cfg_var("max_execution_time")?> ��</td>
		<td width="20%">FTP��</td>
		<td width="20%"><?=showResult(get_magic_quotes_gpc("FTP support"))?></td>
	</tr>
	<tr>
		<td width="15%">վ������·����</td>
		<td width="45%"><?=realpath("../")?></td>
		<td width="20%">Sendmail��</td>
		<td width="20%"><?=showResult(get_magic_quotes_gpc("Internal Sendmail Support for Windows 4"))?></td>
	</tr>
	<tr>
		<td width="15%">�ű��ϴ��ļ���С���ƣ�</td>
		<td width="45%"><?=get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"�������ϴ�����"?></td>
		<td width="20%">��ʾ������Ϣ��</td>
		<td width="20%"><?=showResult(get_cfg_var("display_errors"))?></td>
	</tr>
	<tr>
		<td width="15%">POST�ύ�������ƣ�</td>
		<td width="45%"><?=get_cfg_var("post_max_size")?></td>
		<td width="20%">ʹ��URL���ļ���</td>
		<td width="20%"><?=showResult(get_cfg_var("allow_url_fopen"))?></td>
	</tr>
	<tr>
		<td width="15%">���������֣�</td>
		<td width="45%"><?=getenv("HTTP_ACCEPT_LANGUAGE")?></td>
		<td width="20%">ѹ���ļ�֧��(Zlib)��</td>
		<td width="20%"><?=showResult(function_exists("gzclose"))?></td>
	</tr>
	<tr>
		<td width="15%">�ű�����ʱ��ռ����ڴ棺</td>
		<td width="45%"><?=get_cfg_var("memory_limit")?get_cfg_var("memory_limit"):"��"?></td>
		<td width="20%">ZEND֧��(1.3.0)��</td>
		<td width="20%"><?=showResult(function_exists("zend_version"))?></td>
	</tr>	
	</table>

	
<?php
}


function showResult($v){
	if($v==1){
		echo'<b>��</b>&nbsp;<font class=gray>֧��</font>';
	}else{
		echo'<font class=red><b>��</b></font>&nbsp;<font class=gray>��֧��</font>';
	}
}

?>