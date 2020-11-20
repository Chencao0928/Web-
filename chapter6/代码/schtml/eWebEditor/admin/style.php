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


require("private.php");


$sPosition = $sPosition."��ʽ����";

if ($sAction == "STYLEPREVIEW"){
	InitStyle();
	ShowStylePreview();
	exit;
}


eWebEditor_Header();
ShowPosition();
eWebEditor_Content();
eWebEditor_Footer();


function eWebEditor_Content(){
	switch ($GLOBALS["sAction"]){
	case "UPDATECONFIG":
		DoUpdateConfig();
		break;
	case "COPY":
		InitStyle();
		DoCopy();
		ShowStyleList();
		break;
	case "STYLEADD":
		ShowStyleForm("ADD");
		break;
	case "STYLESET":
		InitStyle();
		ShowStyleForm("SET");
		break;
	case "STYLEADDSAVE":
		CheckStyleForm();
		DoStyleAddSave();
		break;
	case "STYLESETSAVE":
		CheckStyleForm();
		DoStyleSetSave();
		break;
	case "STYLEDEL":
		InitStyle();
		DoStyleDel();
		ShowStyleList();
		break;
	case "CODE":
		InitStyle();
		ShowStyleCode();
		break;
	case "TOOLBAR":
		InitStyle();
		ShowToolBarList();
		break;
	case "TOOLBARADD":
		InitStyle();
		DoToolBarAdd();
		ShowToolBarList();
		break;
	case "TOOLBARMODI":
		InitStyle();
		DoToolBarModi();
		ShowToolBarList();
		break;
	case "TOOLBARDEL":
		InitStyle();
		DoToolBarDel();
		ShowToolBarList();
		break;
	case "BUTTONSET":
		InitStyle();
		InitToolBar();
		ShowButtonList();
		break;
	case "BUTTONSAVE":
		InitStyle();
		InitToolBar();
		DoButtonSave();
		break;
	default:
		ShowStyleList();
		break;
	}
}


function ShowPosition(){
	echo "<table border=0 cellspacing=1 align=center class=navi>".
		"<tr><th>".$GLOBALS["sPosition"]."</th></tr>".
		"<tr><td align=center>[<a href='?'>������ʽ�б�</a>]&nbsp;&nbsp;&nbsp;&nbsp;[<a href='?action=styleadd'>�½�һ��ʽ</a>]&nbsp;&nbsp;&nbsp;&nbsp;[<a href='?action=updateconfig'>����������ʽ��ǰ̨�����ļ�</a>]&nbsp;&nbsp;&nbsp;&nbsp;[<a href='#' onclick='history.back()'>����ǰһҳ</a>]</td></tr>".
		"</table><br>";
}

function ShowMessage($str){
	echo "<table border=0 cellspacing=1 align=center class=list><tr><td>".$str."</td></tr></table><br>";
}

function ShowStyleList(){
	ShowMessage("<b class=blue>����Ϊ��ǰ������ʽ�б�</b>");

	echo "<table border=0 cellpadding=0 cellspacing=1 class=list align=center>".
		"<form action='?action=del' method=post name=myform>".
		"<tr align=center>".
			"<th width='10%'>��ʽ��</th>".
			"<th width='10%'>��ѿ��</th>".
			"<th width='10%'>��Ѹ߶�</th>".
			"<th width='45%'>˵��</th>".
			"<th width='25%'>����</th>".
		"</tr>";

	for ($i=1;$i<=count($GLOBALS["aStyle"]);$i++){
		$aCurrStyle = explode("|||", $GLOBALS["aStyle"][$i]);
		$sManage = "<a href='?action=stylepreview&id=".$i."' target='_blank'>Ԥ��</a>|<a href='?action=code&id=".$i."'>����</a>|<a href='?action=styleset&id=".$i."'>����</a>|<a href='?action=toolbar&id=".$i."'>������</a>|<a href='?action=copy&id=".$i."'>����</a>|<a href='?action=styledel&id=".$i."' onclick=\"return confirm('��ʾ����ȷ��Ҫɾ������ʽ��')\">ɾ��</a>";
		echo "<tr align=center>".
			"<td>".htmlspecialchars($aCurrStyle[0])."</td>".
			"<td>".$aCurrStyle[4]."</td>".
			"<td>".$aCurrStyle[5]."</td>".
			"<td align=left>".htmlspecialchars($aCurrStyle[26])."</td>".
			"<td>".$sManage."</td>".
			"</tr>";
	}
	
	echo "</table><br>";

	ShowMessage("<b class=blue>��ʾ��</b>�����ͨ����������һ��ʽ�Դﵽ�����½���ʽ��Ŀ�ġ�");

}

function DoCopy(){
	$b = false;
	$i = 0;
	while ($b == false){
		$i = $i + 1;
		$sNewName = $GLOBALS["sStyleName"].$i;
		if (StyleName2ID($sNewName) == -1) {
			$b = true;
		}
	}

	$nNewStyleID = count($GLOBALS["aStyle"]) + 1;
	$GLOBALS["aStyle"][$nNewStyleID] = $sNewName.substr($GLOBALS["aStyle"][$GLOBALS["nStyleID"]], strlen($GLOBALS["sStyleName"]));

	$nToolbarNum = count($GLOBALS["aToolbar"]);
	for ($i=1;$i<=$nToolbarNum;$i++){
		$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$i]);
		if ($aCurrToolbar[0] == $GLOBALS["sStyleID"]) {
			$nNewToolbarID = count($GLOBALS["aToolbar"]) + 1;
			$GLOBALS["aToolbar"][$nNewToolbarID] = $nNewStyleID."|||".$aCurrToolbar[1]."|||".$aCurrToolbar[2]."|||".$aCurrToolbar[3];
		}
	}

	WriteConfig();
	WriteStyle($nNewStyleID);
	GoUrl("?");

}

function StyleName2ID($str){
	for ($i=1;$i<=count($GLOBALS["aStyle"]);$i++){
		$aTemp = explode("|||", $GLOBALS["aStyle"][$i]);
		if (strtolower($aTemp[0]) == strtolower($str)){
			return $i;
		}
	}
	return -1;
}

function ShowStyleForm($sFlag){
	
	if ($sFlag == "ADD"){
		$GLOBALS["sStyleID"] = "";
		$GLOBALS["sStyleName"] = "";
		$GLOBALS["sStyleDir"] = "standard";
		$GLOBALS["sStyleCSS"] = "office";
		$GLOBALS["sStyleUploadDir"] = "UploadFile/";
		$GLOBALS["sStyleBaseHref"] = "http://Localhost/eWebEditor/";
		$GLOBALS["sStyleContentPath"] = "UploadFile/";
		$GLOBALS["sStyleWidth"] = "600";
		$GLOBALS["sStyleHeight"] = "400";
		$GLOBALS["sStyleMemo"] = "";
		$GLOBALS["nStyleIsSys"] = 0;
		$s_Title = "������ʽ";
		$s_Action = "StyleAddSave";
		$GLOBALS["sStyleFileExt"] = "rar|zip|exe|doc|xls|chm|hlp";
		$GLOBALS["sStyleFlashExt"] = "swf";
		$GLOBALS["sStyleImageExt"] = "gif|jpg|jpeg|bmp";
		$GLOBALS["sStyleMediaExt"] = "rm|mp3|wav|mid|midi|ra|avi|mpg|mpeg|asf|asx|wma|mov";
		$GLOBALS["sStyleRemoteExt"] = "gif|jpg|bmp";
		$GLOBALS["sStyleFileSize"] = "500";
		$GLOBALS["sStyleFlashSize"] = "100";
		$GLOBALS["sStyleImageSize"] = "100";
		$GLOBALS["sStyleMediaSize"] = "100";
		$GLOBALS["sStyleRemoteSize"] = "100";
		$GLOBALS["sStyleStateFlag"] = "1";
		$GLOBALS["sStyleAutoRemote"] = "1";
		$GLOBALS["sStyleShowBorder"] = "0";
		$GLOBALS["sAutoDetectLanguage"] = "1";
		$GLOBALS["sDefaultLanguage"] = "zh-cn";
		$GLOBALS["sStyleAllowBrowse"] = "0";
		$GLOBALS["sStyleUploadObject"] = "0";
		$GLOBALS["sStyleAutoDir"] = "0";
		$GLOBALS["sStyleDetectFromWord"] = "1";
		$GLOBALS["sStyleInitMode"] = "EDIT";
		$GLOBALS["sStyleBaseUrl"] = "1";
		$GLOBALS["sSLTFlag"] = "0";
		$GLOBALS["sSLTMinSize"] = "300";
		$GLOBALS["sSLTOkSize"] = "120";
		$GLOBALS["sSYFlag"] = "0";
		$GLOBALS["sSYText"] = "��Ȩ����...";
		$GLOBALS["sSYFontColor"] = "000000";
		$GLOBALS["sSYFontSize"] = "12";
		$GLOBALS["sSYFontName"] = "����";
		$GLOBALS["sSYPicPath"] = "";
		$GLOBALS["sSLTSYObject"] = "0";
		$GLOBALS["sSLTSYExt"] = "bmp|jpg|jpeg|gif";
		$GLOBALS["sSYMinSize"] = "100";
		$GLOBALS["sSYShadowColor"] = "FFFFFF";
		$GLOBALS["sSYShadowOffset"] = "1";
	}else{
		$GLOBALS["sStyleName"] = htmlspecialchars($GLOBALS["sStyleName"]);
		$GLOBALS["sStyleDir"] = htmlspecialchars($GLOBALS["sStyleDir"]);
		$GLOBALS["sStyleCSS"] = htmlspecialchars($GLOBALS["sStyleCSS"]);
		$GLOBALS["sStyleUploadDir"] = htmlspecialchars($GLOBALS["sStyleUploadDir"]);
		$GLOBALS["sStyleBaseHref"] = htmlspecialchars($GLOBALS["sStyleBaseHref"]);
		$GLOBALS["sStyleContentPath"] = htmlspecialchars($GLOBALS["sStyleContentPath"]);
		$GLOBALS["sStyleMemo"] = htmlspecialchars($GLOBALS["sStyleMemo"]);
		$GLOBALS["sSYText"] = htmlspecialchars($GLOBALS["sSYText"]);
		$GLOBALS["sSYFontColor"] = htmlspecialchars($GLOBALS["sSYFontColor"]);
		$GLOBALS["sSYFontSize"] = htmlspecialchars($GLOBALS["sSYFontSize"]);
		$GLOBALS["sSYFontName"] = htmlspecialchars($GLOBALS["sSYFontName"]);
		$GLOBALS["sSYPicPath"] = htmlspecialchars($GLOBALS["sSYPicPath"]);
		$s_Title = "������ʽ";
		$s_Action = "StyleSetSave";
	}

	$s_FormStateFlag = InitSelect("d_stateflag", explode("|", "��ʾ|����ʾ"), explode("|", "1|0"), $GLOBALS["sStyleStateFlag"], "", "");
	$s_FormAutoRemote = InitSelect("d_autoremote", explode("|", "�Զ��ϴ�|���Զ��ϴ�"), explode("|", "1|0"), $GLOBALS["sStyleAutoRemote"], "", "");
	$s_FormShowBorder = InitSelect("d_showborder", explode("|", "Ĭ����ʾ|Ĭ�ϲ���ʾ"), explode("|", "1|0"), $GLOBALS["sStyleShowBorder"], "", "");
	$s_FormAutoDetectLanguage = InitSelect("d_autodetectlanguage", explode("|", "�Զ����|���Զ����"), explode("|", "1|0"), $GLOBALS["sAutoDetectLanguage"], "", "");
	$s_FormDefaultLanguage = InitSelect("d_defaultlanguage", explode("|", "��������|��������|Ӣ��"), explode("|", "zh-cn|zh-tw|en"), $GLOBALS["sDefaultLanguage"], "", "");
	$s_FormAllowBrowse = InitSelect("d_allowbrowse", explode("|", "��,����|��,�ر�"), explode("|", "1|0"), $GLOBALS["sStyleAllowBrowse"], "", "");
	$s_FormUploadObject = InitSelect("d_uploadobject", explode("|", "�Դ�"), explode("|", "0"), $GLOBALS["sStyleUploadObject"], "", "");
	$s_FormAutoDir = InitSelect("d_autodir", explode("|", "��ʹ��|��Ŀ¼|����Ŀ¼|������Ŀ¼"), explode("|", "0|1|2|3"), $GLOBALS["sStyleAutoDir"], "", "");
	$s_FormDetectFromWord = InitSelect("d_detectfromword", explode("|", "�Զ��������ʾ|���Զ����"), explode("|", "1|0"), $GLOBALS["sStyleDetectFromWord"], "", "");
	$s_FormInitMode = InitSelect("d_initmode", explode("|", "����ģʽ|�༭ģʽ|�ı�ģʽ|Ԥ��ģʽ"), explode("|", "CODE|EDIT|TEXT|VIEW"), $GLOBALS["sStyleInitMode"], "", "");
	$s_FormBaseUrl = InitSelect("d_baseurl", explode("|", "���·��|���Ը�·��|����ȫ·��"), explode("|", "0|1|2"), $GLOBALS["sStyleBaseUrl"], "", "");

	$s_FormSLTFlag = InitSelect("d_sltflag", explode("|", "ʹ��|��ʹ��"), explode("|", "1|0"), $GLOBALS["sSLTFlag"], "", "");
	$s_FormSYFlag = InitSelect("d_syflag", explode("|", "��ʹ��|����ˮӡ|ͼƬˮӡ"), explode("|", "0|1|2"), $GLOBALS["sSYFlag"], "", "");
	$s_FormSLTSYObject = InitSelect("d_sltsyobject", explode("|", "PHP GD2ͼ�ο�"), explode("|", "0"), $GLOBALS["sSLTSYObject"], "", "");

	$s_Button = "<tr><td align=center colspan=4><input type=submit value='  �ύ  ' align=absmiddle>&nbsp;<input type=reset name=btnReset value='  ����  '></td></tr>";
	
	echo "<table border=0 cellpadding=0 cellspacing=1 align=center class=form>".
			"<form action='?action=".$s_Action."&id=".$GLOBALS["sStyleID"]."' method=post name=myform>".
			"<tr><th colspan=4>&nbsp;&nbsp;".$s_Title."������Ƶ������ɿ�˵������*��Ϊ�����</th></tr>".
			"<tr><td width='15%'>��ʽ���ƣ�</td><td width='35%'><input type=text class=input size=20 name=d_name title='���ô���ʽ�����֣���Ҫ��������ţ����50���ַ�����' value=\"".$GLOBALS["sStyleName"]."\"> <span class=red>*</span></td><td width='15%'>��ʼģʽ��</td><td width='35%'>".$s_FormInitMode." <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>�ϴ������</td><td width='35%'>".$s_FormUploadObject." <span class=red>*</span></td><td width='15%'>�Զ�Ŀ¼��</td><td width='35%'>".$s_FormAutoDir." <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>ͼƬĿ¼��</td><td width='35%'><input type=text class=input size=20 name=d_dir title='��Ŵ���ʽͼƬ�ļ���Ŀ¼����������ButtonImage�£����50���ַ�����' value=\"".$GLOBALS["sStyleDir"]."\"> <span class=red>*</span></td><td width='15%'>��ʽĿ¼��</td><td width='35%'><input type=text class=input size=20 name=d_css title='��Ŵ���ʽcss�ļ���Ŀ¼����������CSS�£����50���ַ�����' value=\"".$GLOBALS["sStyleCSS"]."\"> <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>��ѿ�ȣ�</td><td width='35%'><input type=text class=input name=d_width size=20 title='�������Ч���Ŀ�ȣ�������' value='".$GLOBALS["sStyleWidth"]."'> <span class=red>*</span></td><td width='15%'>��Ѹ߶ȣ�</td><td width='35%'><input type=text class=input name=d_height size=20 title='�������Ч���ĸ߶ȣ�������' value='".$GLOBALS["sStyleHeight"]."'> <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>״ ̬ ����</td><td width='35%'>".$s_FormStateFlag." <span class=red>*</span></td><td width='15%'>Wordճ����</td><td width='35%'>".$s_FormDetectFromWord." <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>Զ���ļ���</td><td width='35%'>".$s_FormAutoRemote." <span class=red>*</span></td><td width='15%'>ָ�����룺</td><td width='35%'>".$s_FormShowBorder." <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>�Զ����Լ�⣺</td><td width='35%'>".$s_FormAutoDetectLanguage." <span class=red>*</span></td><td width='15%'>Ĭ�����ԣ�</td><td width='35%'>".$s_FormDefaultLanguage." <span class=red>*</span></td></tr>".
		"<tr><td width='15%'>�ϴ��ļ������</td><td width='35%'>".$s_FormAllowBrowse." <span class=red>*</span></td><td width='15%'>&nbsp;</td><td width='35%'>&nbsp;</td></tr>".
			"<tr><td>��ע˵����</td><td colspan=3><input type=text name=d_memo size=90 title='����ʽ��˵�����������ڵ���' value=\"".$GLOBALS["sStyleMemo"]."\"></td></tr>".
			"<tr><td colspan=4><span class=red>&nbsp;&nbsp;&nbsp;�ϴ��ļ���ϵͳ�ļ�·��������ã�ֻ����ʹ�����·��ģʽʱ����Ҫ������ʾ·��������·������</span></td></tr>".
			"<tr><td width='15%'>·��ģʽ��</td><td width='35%'>".$s_FormBaseUrl." <span class=red>*</span> <a href='#baseurl'>˵��</a></td><td width='15%'>�ϴ�·����</td><td width='35%'><input type=text class=input size=20 name=d_uploaddir title='�ϴ��ļ������·�������eWebEditor��Ŀ¼�ļ���·�������50���ַ�����' value=\"".$GLOBALS["sStyleUploadDir"]."\"> <span class=red>*</span></td></tr>".
			"<tr><td width='15%'>��ʾ·����</td><td width='35%'><input type=text class=input size=20 name=d_basehref title='��ʾ����ҳ�����·����������&quot;/&quot;��ͷ�����50���ַ�����' value=\"".$GLOBALS["sStyleBaseHref"]."\"></td><td width='15%'>����·����</td><td width='35%'><input type=text class=input size=20 name=d_contentpath title='ʵ�ʱ����������е�·���������ʾ·����·����������&quot;/&quot;��ͷ�����50���ַ�����' value=\"".$GLOBALS["sStyleContentPath"]."\"></td></tr>".
			"<tr><td colspan=4><span class=red>&nbsp;&nbsp;&nbsp;�����ϴ��ļ����ͼ��ļ���С���ã��ļ���С��λΪKB��0��ʾû�����ƣ���</span></td></tr>".
			"<tr><td width='15%'>ͼƬ���ͣ�</td><td width='35%'><input type=text class=input name=d_imageext size=20 title='����ͼƬ��ص��ϴ������250���ַ�����' value='".$GLOBALS["sStyleImageExt"]."'></td><td width='15%'>ͼƬ���ƣ�</td><td width='35%'><input type=text class=input name=d_imagesize size=20 title='�����ͣ���λKB' value='".$GLOBALS["sStyleImageSize"]."'></td></tr>".
			"<tr><td width='15%'>Flash���ͣ�</td><td width='35%'><input type=text class=input name=d_flashext size=20 title='���ڲ���Flash���������250���ַ�����' value='".$GLOBALS["sStyleFlashExt"]."'></td><td width='15%'>Flash���ƣ�</td><td width='35%'><input type=text class=input name=d_flashsize size=20 title='�����ͣ���λKB' value='".$GLOBALS["sStyleFlashSize"]."'></td></tr>".
			"<tr><td width='15%'>ý�����ͣ�</td><td width='35%'><input type=text class=input name=d_mediaext size=20 title='���ڲ���ý���ļ������250���ַ�����' value='".$GLOBALS["sStyleMediaExt"]."'></td><td width='15%'>ý�����ƣ�</td><td width='35%'><input type=text class=input name=d_mediasize size=20 title='�����ͣ���λKB' value='".$GLOBALS["sStyleMediaSize"]."'></td></tr>".
			"<tr><td width='15%'>�������ͣ�</td><td width='35%'><input type=text class=input name=d_fileext size=20 title='���ڲ��������ļ������250���ַ�����' value='".$GLOBALS["sStyleFileExt"]."'></td><td width='15%'>�������ƣ�</td><td width='35%'><input type=text class=input name=d_filesize size=20 title='�����ͣ���λKB' value='".$GLOBALS["sStyleFileSize"]."'></td></tr>".
			"<tr><td width='15%'>Զ�����ͣ�</td><td width='35%'><input type=text class=input name=d_remoteext size=20 title='�����Զ��ϴ�Զ���ļ������250���ַ�����' value='".$GLOBALS["sStyleRemoteExt"]."'></td><td width='15%'>Զ�����ƣ�</td><td width='35%'><input type=text class=input name=d_remotesize size=20 title='�����ͣ���λKB' value='".$GLOBALS["sStyleRemoteSize"]."'></td></tr>".
			"<tr><td colspan=4><span class=red>&nbsp;&nbsp;&nbsp;����ͼ��ˮӡ������ã�</span></td></tr>".
			"<tr><td width='15%'>ͼ�δ��������</td><td width='35%'>".$s_FormSLTSYObject."</td><td width='15%'>����ͼ����չ����</td><td width='35%'><input type=text name=d_sltsyext size=20 class=input value=\"".$GLOBALS["sSLTSYExt"]."\"></td></tr>".
			"<tr><td width='15%'>����ͼʹ��״̬��</td><td width='35%'>".$s_FormSLTFlag."</td><td width='15%'>����ͼ��������</td><td width='35%'><input type=text name=d_sltminsize size=20 class=input title='ͼ�εĳ���ֻ�дﵽ����С����Ҫ��ʱ�Ż���������ͼ��������' value='".$GLOBALS["sSLTMinSize"]."'>px</td></tr>".
			"<tr><td width='15%'>����ͼ���ɳ��ȣ�</td><td width='35%'><input type=text name=d_sltoksize size=20 class=input title='���ɵ�����ͼ����ֵ��������' value='".$GLOBALS["sSLTOkSize"]."'>px</td><td width='15%'>&nbsp;</td><td width='35%'>&nbsp;</td></tr>".
			"<tr><td width='15%'>ˮӡʹ��״̬��</td><td width='35%'>".$s_FormSYFlag."</td><td width='15%'>ˮӡ���������</td><td width='35%'><input type=text name=d_syminsize size=20 class=input title='ͼ�εĿ��ֻ�дﵽ����С���Ҫ��ʱ�Ż�����ˮӡ��������' value='".$GLOBALS["sSYMinSize"]."'>px</td></tr>".
			"<tr><td width='15%'>����ˮӡ���ݣ�</td><td width='35%'><input type=text name=d_sytext size=20 class=input title='��ʹ������ˮӡʱ����������' value=\"".$GLOBALS["sSYText"]."\"></td><td width='15%'>����ˮӡ������ɫ��</td><td width='35%'><input type=text name=d_syfontcolor size=20 class=input title='��ʹ������ˮӡʱ���ֵ���ɫ' value=\"".$GLOBALS["sSYFontColor"]."\"></td></tr>".
			"<tr><td width='15%'>����ˮӡ��Ӱ��ɫ��</td><td width='35%'><input type=text name=d_syshadowcolor size=20 class=input title='��ʹ������ˮӡʱ��������Ӱ��ɫ' value=\"".$GLOBALS["sSYShadowColor"]."\"></td><td width='15%'>����ˮӡ��Ӱ��С��</td><td width='35%'><input type=text name=d_syshadowoffset size=20 class=input title='��ʹ������ˮӡʱ���ֵ���Ӱ��С' value=\"".$GLOBALS["sSYShadowOffset"]."\">px</td></tr>".
			"<tr><td width='15%'>����ˮӡ�����С��</td><td width='35%'><input type=text name=d_syfontsize size=20 class=input title='��ʹ������ˮӡʱ���ֵ������С' value=\"".$GLOBALS["sSYFontSize"]."\">px</td><td width='15%'>��������⼰·����</td><td width='35%'><input type=text name=d_syfontname size=20 class=input title='��ʹ��������ʱ���������ļ���' value=\"".$GLOBALS["sSYFontName"]."\"> <a href='#fontname'>˵��</a></td></tr>".
			"<tr><td width='15%'>ͼƬˮӡͼƬ·����</td><td width='35%'><input type=text name=d_sypicpath size=20 class=input title='��ʹ��ͼƬˮӡʱͼƬ��·��' value=\"".$GLOBALS["sSYPicPath"]."\"></td><td width='15%'></td><td width='35%'></td></tr>".
			$s_Button.
			"</form>".
			"</table><br>";

	$sMsg = "<a name=baseurl></a><p><span class=blue><b>·��ģʽ����˵����</b></span><br>".
		"<b>���·����</b>ָ���е�����ϴ����Զ������ļ�·�����༭����\"UploadFile/...\"��\"../UploadFile/...\"��ʽ���֣���ʹ�ô�ģʽʱ����ʾ·��������·�������ʾ·��������\"/\"��ͷ�ͽ�β������·�������в�����\"/\"��ͷ��<br>".
		"<b>���Ը�·����</b>ָ���е�����ϴ����Զ������ļ�·�����༭����\"/eWebEditor/UploadFile/...\"������ʽ���֣���ʹ�ô�ģʽʱ����ʾ·��������·�������<br>".
		"<b>����ȫ·����</b>ָ���е�����ϴ����Զ������ļ�·�����༭����\"http://xxx.xxx.xxx/eWebEditor/UploadFile/...\"������ʽ���֣���ʹ�ô�ģʽʱ����ʾ·��������·�������</p>".
		"<a name=fontname></a><p><span class=blue><b>��������⼰·������˵����</b></span><br>".
		"��ʹ����������ˮӡʱ����һ���ֿ⣬ʹ��Ӣ��ˮӡʱΪ���Ч�������գ�����Ϊ��simkai.ttf��������Ѵ�������ļ��������༭����phpĿ¼��</p>";

	ShowMessage($sMsg);

}

function InitStyle(){
	global $sStyleID, $sStyleName, $sStyleDir, $sStyleCSS, $sStyleUploadDir, $sStyleWidth, $sStyleHeight, $sStyleMemo, $nStyleIsSys, $sStyleStateFlag, $sStyleDetectFromWord, $sStyleInitMode, $sStyleBaseUrl, $sStyleUploadObject, $sStyleAutoDir, $sStyleBaseHref, $sStyleContentPath, $sStyleAutoRemote, $sStyleShowBorder, $sAutoDetectLanguage, $sDefaultLanguage, $sStyleAllowBrowse;
	global $sSLTFlag, $sSLTMinSize, $sSLTOkSize, $sSYFlag, $sSYText, $sSYFontColor, $sSYFontSize, $sSYFontName, $sSYPicPath, $sSLTSYObject, $sSLTSYExt, $sSYMinSize, $sSYShadowColor, $sSYShadowOffset;
	global $sStyleFileExt, $sStyleFlashExt, $sStyleImageExt, $sStyleMediaExt, $sStyleRemoteExt, $sStyleFileSize, $sStyleFlashSize, $sStyleImageSize, $sStyleMediaSize, $sStyleRemoteSize;
	global $sToolBarID, $sToolBarName, $sToolBarOrder, $sToolBarButton;
	global $nStyleID;

	$b = false;
	$sStyleID = toTrim("id");

	if (is_numeric($sStyleID)) {
		$nStyleID = (int)($sStyleID);
		if ($nStyleID <= count($GLOBALS["aStyle"])) {
			$aCurrStyle = explode("|||", $GLOBALS["aStyle"][$nStyleID]);
			$sStyleName = $aCurrStyle[0];
			$sStyleDir = $aCurrStyle[1];
			$sStyleCSS = $aCurrStyle[2];
			$sStyleUploadDir = $aCurrStyle[3];
			$sStyleBaseHref = $aCurrStyle[22];
			$sStyleContentPath = $aCurrStyle[23];
			$sStyleWidth = $aCurrStyle[4];
			$sStyleHeight = $aCurrStyle[5];
			$sStyleMemo = $aCurrStyle[26];
			$sStyleFileExt = $aCurrStyle[6];
			$sStyleFlashExt = $aCurrStyle[7];
			$sStyleImageExt = $aCurrStyle[8];
			$sStyleMediaExt = $aCurrStyle[9];
			$sStyleRemoteExt = $aCurrStyle[10];
			$sStyleFileSize = $aCurrStyle[11];
			$sStyleFlashSize = $aCurrStyle[12];
			$sStyleImageSize = $aCurrStyle[13];
			$sStyleMediaSize = $aCurrStyle[14];
			$sStyleRemoteSize = $aCurrStyle[15];
			$sStyleStateFlag = $aCurrStyle[16];
			$sStyleAutoRemote = $aCurrStyle[24];
			$sStyleShowBorder = $aCurrStyle[25];
			$sAutoDetectLanguage = $aCurrStyle[27];
			$sDefaultLanguage = $aCurrStyle[28];
			$sStyleUploadObject = $aCurrStyle[20];
			$sStyleAutoDir = $aCurrStyle[21];
			$sStyleDetectFromWord = $aCurrStyle[17];
			$sStyleInitMode = $aCurrStyle[18];
			$sStyleBaseUrl = $aCurrStyle[19];
			$sSLTFlag = $aCurrStyle[29];
			$sSLTMinSize = $aCurrStyle[30];
			$sSLTOkSize = $aCurrStyle[31];
			$sSYFlag = $aCurrStyle[32];
			$sSYText = $aCurrStyle[33];
			$sSYFontColor = $aCurrStyle[34];
			$sSYFontSize = $aCurrStyle[35];
			$sSYFontName = $aCurrStyle[36];
			$sSYPicPath = $aCurrStyle[37];
			$sSLTSYObject = $aCurrStyle[38];
			$sSLTSYExt = $aCurrStyle[39];
			$sSYMinSize = $aCurrStyle[40];
			$sSYShadowColor = $aCurrStyle[41];
			$sSYShadowOffset = $aCurrStyle[42];
			$sStyleAllowBrowse = $aCurrStyle[43];
			$b = true;
		}
	}
	if ($b == false) {
		GoError("��Ч����ʽID�ţ���ͨ��ҳ���ϵ����ӽ��в�����");
	}
}

function CheckStyleForm(){
	$GLOBALS["sStyleName"] = toTrim("d_name");
	$GLOBALS["sStyleDir"] = toTrim("d_dir");
	$GLOBALS["sStyleCSS"] = toTrim("d_css");
	$GLOBALS["sStyleUploadDir"] = toTrim("d_uploaddir");
	$GLOBALS["sStyleBaseHref"] = toTrim("d_basehref");
	$GLOBALS["sStyleContentPath"] = toTrim("d_contentpath");
	$GLOBALS["sStyleWidth"] = toTrim("d_width");
	$GLOBALS["sStyleHeight"] = toTrim("d_height");
	$GLOBALS["sStyleMemo"] = toTrim("d_memo");
	$GLOBALS["sStyleImageExt"] = toTrim("d_imageext");
	$GLOBALS["sStyleFlashExt"] = toTrim("d_flashext");
	$GLOBALS["sStyleMediaExt"] = toTrim("d_mediaext");
	$GLOBALS["sStyleRemoteExt"] = toTrim("d_remoteext");
	$GLOBALS["sStyleFileExt"] = toTrim("d_fileext");
	$GLOBALS["sStyleImageSize"] = toTrim("d_imagesize");
	$GLOBALS["sStyleFlashSize"] = toTrim("d_flashsize");
	$GLOBALS["sStyleMediaSize"] = toTrim("d_mediasize");
	$GLOBALS["sStyleRemoteSize"] = toTrim("d_remotesize");
	$GLOBALS["sStyleFileSize"] = toTrim("d_filesize");
	$GLOBALS["sStyleStateFlag"] = toTrim("d_stateflag");
	$GLOBALS["sStyleAutoRemote"] = toTrim("d_autoremote");
	$GLOBALS["sStyleShowBorder"] = toTrim("d_showborder");
	$GLOBALS["sAutoDetectLanguage"] = toTrim("d_autodetectlanguage");
	$GLOBALS["sDefaultLanguage"] = toTrim("d_defaultlanguage");
	$GLOBALS["sStyleAllowBrowse"] = toTrim("d_allowbrowse");
	$GLOBALS["sStyleUploadObject"] = toTrim("d_uploadobject");
	$GLOBALS["sStyleAutoDir"] = toTrim("d_autodir");
	$GLOBALS["sStyleDetectFromWord"] = toTrim("d_detectfromword");
	$GLOBALS["sStyleInitMode"] = toTrim("d_initmode");
	$GLOBALS["sStyleBaseUrl"] = toTrim("d_baseurl");
	$GLOBALS["sSLTFlag"] = toTrim("d_sltflag");
	$GLOBALS["sSLTMinSize"] = toTrim("d_sltminsize");
	$GLOBALS["sSLTOkSize"] = toTrim("d_sltoksize");
	$GLOBALS["sSYFlag"] = toTrim("d_syflag");
	$GLOBALS["sSYText"] = toTrim("d_sytext");
	$GLOBALS["sSYFontColor"] = toTrim("d_syfontcolor");
	$GLOBALS["sSYFontSize"] = toTrim("d_syfontsize");
	$GLOBALS["sSYFontName"] = toTrim("d_syfontname");
	$GLOBALS["sSYPicPath"] = toTrim("d_sypicpath");
	$GLOBALS["sSLTSYObject"] = toTrim("d_sltsyobject");
	$GLOBALS["sSLTSYExt"] = toTrim("d_sltsyext");
	$GLOBALS["sSYMinSize"] = toTrim("d_syminsize");
	$GLOBALS["sSYShadowColor"] = toTrim("d_syshadowcolor");
	$GLOBALS["sSYShadowOffset"] = toTrim("d_syshadowoffset");

	$GLOBALS["sStyleUploadDir"] = str_replace("\\", "/", $GLOBALS["sStyleUploadDir"]);
	$GLOBALS["sStyleBaseHref"] = str_replace("\\", "/", $GLOBALS["sStyleBaseHref"]);
	$GLOBALS["sStyleContentPath"] = str_replace("\\", "/", $GLOBALS["sStyleContentPath"]);
	if (substr($GLOBALS["sStyleUploadDir"], -1) != "/"){
		$GLOBALS["sStyleUploadDir"] = $GLOBALS["sStyleUploadDir"]."/";
	}
	if (substr($GLOBALS["sStyleBaseHref"], -1) != "/"){
		$GLOBALS["sStyleBaseHref"] = $GLOBALS["sStyleBaseHref"]."/";
	}
	if (substr($GLOBALS["sStyleContentPath"], -1) != "/"){
		$GLOBALS["sStyleContentPath"] = $GLOBALS["sStyleContentPath"]."/";
	}

	if ($GLOBALS["sStyleName"] == ""){
		GoError("��ʽ������Ϊ�գ�");
	}
	if (IsSafeStr($GLOBALS["sStyleName"]) == false){
		GoError("��ʽ��������������ַ���");
	}
	if ($GLOBALS["sStyleDir"] == ""){
		GoError("��ťͼƬĿ¼������Ϊ�գ�");
	}
	if (IsSafeStr($GLOBALS["sStyleDir"]) == false){
		GoError("��ťͼƬĿ¼��������������ַ���");
	}
	if ($GLOBALS["sStyleCSS"] == ""){
		GoError("��ʽCSSĿ¼������Ϊ�գ�");
	}
	if (IsSafeStr($GLOBALS["sStyleCSS"]) == false){
		GoError("��ʽCSSĿ¼��������������ַ���");
	}

	if ($GLOBALS["sStyleUploadDir"] == ""){
		GoError("�ϴ�·������Ϊ�գ�");
	}
	if (IsSafeStr($GLOBALS["sStyleUploadDir"]) == false){
		GoError("�ϴ�·��������������ַ���");
	}
	switch ($GLOBALS["sStyleBaseUrl"]){
	case "0":
		if ($GLOBALS["sStyleBaseHref"] == ""){
			GoError("��ʹ�����·��ģʽʱ����ʾ·������Ϊ�գ�");
		}
		if (IsSafeStr($GLOBALS["sStyleBaseHref"]) == false){
			GoError("��ʹ�����·��ģʽʱ����ʾ·��������������ַ���");
		}
		if (substr($GLOBALS["sStyleBaseHref"], 0, 1) != "/"){
			GoError("��ʹ�����·��ģʽʱ����ʾ·�������� / ��ͷ��");
		}

		if ($GLOBALS["sStyleContentPath"] == ""){
			GoError("��ʹ�����·��ģʽʱ������·������Ϊ�գ�");
		}
		if (IsSafeStr($GLOBALS["sStyleContentPath"]) == false){
			GoError("��ʹ�����·��ģʽʱ������·��������������ַ���");
		}
		if (substr($GLOBALS["sStyleContentPath"], 0, 1) == "/"){
			GoError("��ʹ�����·��ģʽʱ������·��������&quot;/&quot;��ͷ��");
		}
		break;
	case "1":
	case "2":
		$GLOBALS["sStyleBaseHref"] = "";
		$GLOBALS["sStyleContentPath"] = "";
		break;
	}
	
	if (!is_numeric($GLOBALS["sStyleWidth"])){
		GoError("����д��Ч��������ÿ�ȣ�");
	}
	if (!is_numeric($GLOBALS["sStyleHeight"])){
		GoError("����д��Ч��������ø߶ȣ�");
	}


	if (!is_numeric($GLOBALS["sStyleImageSize"])){
		GoError("����д��Ч��ͼƬ���ƴ�С��");
	}
	if (!is_numeric($GLOBALS["sStyleFlashSize"])){
		GoError("����д��Ч��Flash���ƴ�С��");
	}
	if (!is_numeric($GLOBALS["sStyleMediaSize"])){
		GoError("����д��Ч��ý���ļ����ƴ�С��");
	}
	if (!is_numeric($GLOBALS["sStyleFileSize"])){
		GoError("����д��Ч�������ļ����ƴ�С��");
	}
	if (!is_numeric($GLOBALS["sStyleRemoteSize"])){
		GoError("����д��Ч��Զ���ļ����ƴ�С��");
	}

	if (!is_numeric($GLOBALS["sSLTMinSize"])) {
		GoError("����д��Ч������ͼʹ����С��������������Ϊ�գ���Ϊ�����ͣ�");
	}
	if (!is_numeric($GLOBALS["sSLTOkSize"])) {
		GoError("����д��Ч������ͼ���ɳ��ȣ�����Ϊ�գ���Ϊ�����ͣ�");
	}

	if (!is_numeric($GLOBALS["sSYMinSize"])) {
		GoError("����д��Ч��ˮӡ����С�������������Ϊ�գ���Ϊ�����ͣ�");
	}
	if ($GLOBALS["sSYText"] == "") {
		GoError("����д��Чˮӡ�������ݣ�����Ϊ�գ�");
	}
	if (!isValidColor($GLOBALS["sSYFontColor"])) {
		GoError("����д��Ч��ˮӡ������ɫ��6λ���ȣ����ɫ��000000��");
	}
	if (!isValidColor($GLOBALS["sSYShadowColor"])) {
		GoError("����д��Ч��ˮӡ������Ӱ��ɫ��6λ���ȣ����ɫ��FFFFFF��");
	}
	if (!is_numeric($GLOBALS["sSYShadowOffset"])) {
		GoError("����д��Ч��ˮӡ������Ӱ��С������Ϊ�գ���Ϊ�����ͣ�");
	}
	if (!is_numeric($GLOBALS["sSYFontSize"])) {
		GoError("����д��Ч��ˮӡ���ִ�С������Ϊ�գ���Ϊ�����ͣ�");
	}

}

function DoStyleAddSave(){

	if (StyleName2ID($GLOBALS["sStyleName"]) != -1){
		GoError("����ʽ���Ѿ����ڣ�������һ����ʽ����");
	}

	$nNewStyleID = count($GLOBALS["aStyle"]) + 1;

	$GLOBALS["aStyle"][$nNewStyleID] = $GLOBALS["sStyleName"]."|||".$GLOBALS["sStyleDir"]."|||".$GLOBALS["sStyleCSS"]."|||".$GLOBALS["sStyleUploadDir"]."|||".$GLOBALS["sStyleWidth"]."|||".$GLOBALS["sStyleHeight"]."|||".$GLOBALS["sStyleFileExt"]."|||".$GLOBALS["sStyleFlashExt"]."|||".$GLOBALS["sStyleImageExt"]."|||".$GLOBALS["sStyleMediaExt"]."|||".$GLOBALS["sStyleRemoteExt"]."|||".$GLOBALS["sStyleFileSize"]."|||".$GLOBALS["sStyleFlashSize"]."|||".$GLOBALS["sStyleImageSize"]."|||".$GLOBALS["sStyleMediaSize"]."|||".$GLOBALS["sStyleRemoteSize"]."|||".$GLOBALS["sStyleStateFlag"]."|||".$GLOBALS["sStyleDetectFromWord"]."|||".$GLOBALS["sStyleInitMode"]."|||".$GLOBALS["sStyleBaseUrl"]."|||".$GLOBALS["sStyleUploadObject"]."|||".$GLOBALS["sStyleAutoDir"]."|||".$GLOBALS["sStyleBaseHref"]."|||".$GLOBALS["sStyleContentPath"]."|||".$GLOBALS["sStyleAutoRemote"]."|||".$GLOBALS["sStyleShowBorder"]."|||".$GLOBALS["sStyleMemo"]."|||".$GLOBALS["sAutoDetectLanguage"]."|||".$GLOBALS["sDefaultLanguage"]."|||".$GLOBALS["sSLTFlag"]."|||".$GLOBALS["sSLTMinSize"]."|||".$GLOBALS["sSLTOkSize"]."|||".$GLOBALS["sSYFlag"]."|||".$GLOBALS["sSYText"]."|||".$GLOBALS["sSYFontColor"]."|||".$GLOBALS["sSYFontSize"]."|||".$GLOBALS["sSYFontName"]."|||".$GLOBALS["sSYPicPath"]."|||".$GLOBALS["sSLTSYObject"]."|||".$GLOBALS["sSLTSYExt"]."|||".$GLOBALS["sSYMinSize"]."|||".$GLOBALS["sSYShadowColor"]."|||".$GLOBALS["sSYShadowOffset"]."|||".$GLOBALS["sStyleAllowBrowse"];

	WriteConfig();
	WriteStyle($nNewStyleID);

	ShowMessage("<b><span class=red>��ʽ���ӳɹ���</span></b><li><a href='?action=toolbar&id=".$nNewStyleID."'>���ô���ʽ�µĹ�����</a>");

}

function DoUpdateConfig(){
	WriteConfig();
	for ($i=1;$i<=count($GLOBALS["aStyle"]);$i++){
		WriteStyle($i);
	}
	ShowMessage("<b><span class=red>������ʽ��ǰ̨�����ļ����²����ɹ���</span></b><li><a href='?'>����������ʽ�б�</a>");
}

function DoStyleSetSave(){
	$GLOBALS["sStyleID"] = toTrim("id");
	if (is_numeric($GLOBALS["sStyleID"])) {
		$n = StyleName2ID($GLOBALS["sStyleName"]);
		if ((($n) != (int)$GLOBALS["sStyleID"]) && ($n != -1)) {
			GoError("����ʽ���Ѿ����ڣ�������һ����ʽ����");
		}
		
		if (((int)($GLOBALS["sStyleID"]) < 1) && ((int)($GLOBALS["sStyleID"])>count($GLOBALS["aStyle"]))) {
			GoError("��Ч����ʽID�ţ���ͨ��ҳ���ϵ����ӽ��в�����");
		}

		$aTemp = explode("|||", $GLOBALS["aStyle"][$GLOBALS["sStyleID"]]);
		$s_OldStyleName = $aTemp[0];

		$GLOBALS["aStyle"][$GLOBALS["sStyleID"]] = $GLOBALS["sStyleName"]."|||".$GLOBALS["sStyleDir"]."|||".$GLOBALS["sStyleCSS"]."|||".$GLOBALS["sStyleUploadDir"]."|||".$GLOBALS["sStyleWidth"]."|||".$GLOBALS["sStyleHeight"]."|||".$GLOBALS["sStyleFileExt"]."|||".$GLOBALS["sStyleFlashExt"]."|||".$GLOBALS["sStyleImageExt"]."|||".$GLOBALS["sStyleMediaExt"]."|||".$GLOBALS["sStyleRemoteExt"]."|||".$GLOBALS["sStyleFileSize"]."|||".$GLOBALS["sStyleFlashSize"]."|||".$GLOBALS["sStyleImageSize"]."|||".$GLOBALS["sStyleMediaSize"]."|||".$GLOBALS["sStyleRemoteSize"]."|||".$GLOBALS["sStyleStateFlag"]."|||".$GLOBALS["sStyleDetectFromWord"]."|||".$GLOBALS["sStyleInitMode"]."|||".$GLOBALS["sStyleBaseUrl"]."|||".$GLOBALS["sStyleUploadObject"]."|||".$GLOBALS["sStyleAutoDir"]."|||".$GLOBALS["sStyleBaseHref"]."|||".$GLOBALS["sStyleContentPath"]."|||".$GLOBALS["sStyleAutoRemote"]."|||".$GLOBALS["sStyleShowBorder"]."|||".$GLOBALS["sStyleMemo"]."|||".$GLOBALS["sAutoDetectLanguage"]."|||".$GLOBALS["sDefaultLanguage"]."|||".$GLOBALS["sSLTFlag"]."|||".$GLOBALS["sSLTMinSize"]."|||".$GLOBALS["sSLTOkSize"]."|||".$GLOBALS["sSYFlag"]."|||".$GLOBALS["sSYText"]."|||".$GLOBALS["sSYFontColor"]."|||".$GLOBALS["sSYFontSize"]."|||".$GLOBALS["sSYFontName"]."|||".$GLOBALS["sSYPicPath"]."|||".$GLOBALS["sSLTSYObject"]."|||".$GLOBALS["sSLTSYExt"]."|||".$GLOBALS["sSYMinSize"]."|||".$GLOBALS["sSYShadowColor"]."|||".$GLOBALS["sSYShadowOffset"]."|||".$GLOBALS["sStyleAllowBrowse"];

	}else{
		GoError("��Ч����ʽID�ţ���ͨ��ҳ���ϵ����ӽ��в�����");
	}

	WriteConfig();
	if (strtolower($s_OldStyleName) != strtolower($GLOBALS["sStyleName"])){
		DeleteFile($s_OldStyleName);
	}
	WriteStyle($GLOBALS["sStyleID"]);

	ShowMessage("<b><span class=red>��ʽ�޸ĳɹ���</span></b><li><a href='?action=stylepreview&id=".$GLOBALS["sStyleID"]."' target='_blank'>Ԥ������ʽ</a><li><a href='?action=toolbar&id=".$GLOBALS["sStyleID"]."'>���ô���ʽ�µĹ�����</a>");

}

function DoStyleDel(){
	$GLOBALS["aStyle"][$GLOBALS["sStyleID"]] = "";
	WriteConfig();
	DeleteFile($GLOBALS["sStyleName"]);
	GoUrl("?");
}

function ShowStylePreview(){
	echo "<html><head>".
		"<title>��ʽԤ��</title>".
		"<meta http-equiv='Content-Type' content='text/html; charset=gb2312'>".
		"</head><body>".
		"<input type=hidden name=content1  value=''>".
		"<iframe ID='eWebEditor1' src='../ewebeditor.htm?id=content1&style=".$GLOBALS["sStyleName"]."' frameborder=0 scrolling=no width='".$GLOBALS["sStyleWidth"]."' HEIGHT='".$GLOBALS["sStyleHeight"]."'></iframe>".
		"</body></html>";
}

function ShowStyleCode(){
	echo "<table border=0 cellspacing=1 align=center class=list>".
		"<tr><th>��ʽ��".htmlspecialchars($GLOBALS["sStyleName"])."������ѵ��ô������£�����XXX��ʵ�ʹ����ı�������޸ģ���</th></tr>".
		"<tr><td><textarea rows=5 cols=65 style='width:100%'><IFRAME ID=\"eWebEditor1\" SRC=\"ewebeditor.htm?id=XXX&style=".$GLOBALS["sStyleName"]."\" FRAMEBORDER=\"0\" SCROLLING=\"no\" WIDTH=\"".$GLOBALS["sStyleWidth"]."\" HEIGHT=\"".$GLOBALS["sStyleHeight"]."\"></IFRAME></textarea></td></tr>".
		"</table>";
}

function ShowToolBarList(){

	ShowMessage("<b class=blue>��ʽ��".htmlspecialchars($GLOBALS["sStyleName"])."���µĹ���������</b>");

	$nMaxOrder = 0;
	for ($i=1;$i<=count($GLOBALS["aToolbar"]);$i++){
		$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$i]);
		if ($aCurrToolbar[0] == $GLOBALS["sStyleID"]) {
			if ((int)($aCurrToolbar[3]) > $nMaxOrder) {
				$nMaxOrder = (int)($aCurrToolbar[3]);
			}
		}
	}
	$nMaxOrder = $nMaxOrder + 1;

	$s_AddForm = "<hr width='80%' align=center size=1><table border=0 cellpadding=4 cellspacing=0 align=center>".
	"<form action='?id=".$GLOBALS["sStyleID"]."&action=toolbaradd' name='addform' method=post>".
	"<tr><td>����������<input type=text name=d_name size=20 class=input value='������".$nMaxOrder."'> ����ţ�<input type=text name=d_order size=5 value='".$nMaxOrder."' class=input> <input type=submit name=b1 value='����������'></td></tr>".
	"</form></table><hr width='80%' align=center size=1>";

	$s_ModiForm = "<form action='?id=".$GLOBALS["sStyleID"]."&action=toolbarmodi' name=modiform method=post>".
		"<table border=0 cellpadding=0 cellspacing=1 align=center class=form>".
		"<tr align=center><th>ID</th><th>��������</th><th>�����</th><th>����</th></tr>";

	for ($i=1;$i<=count($GLOBALS["aToolbar"]);$i++){
		$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$i]);
		if ($aCurrToolbar[0] == $GLOBALS["sStyleID"]){
			$s_Manage = "<a href='?id=".$GLOBALS["sStyleID"]."&action=buttonset&toolbarid=".$i."'>��ť����</a>";
			$s_Manage = $s_Manage."|<a href='?id=".$GLOBALS["sStyleID"]."&action=toolbardel&delid=".$i."'>ɾ��</a>";
			$s_ModiForm = $s_ModiForm."<tr align=center>".
				"<td>".$i."</td>".
				"<td><input type=text name='d_name".$i."' value=\"".htmlspecialchars($aCurrToolbar[2])."\" size=30 class=input></td>".
				"<td><input type=text name='d_order".$i."' value='".$aCurrToolbar[3]."' size=5 class=input></td>".
				"<td>".$s_Manage."</td>".
				"</tr>";
		}
	}

	$s_SubmitButton = "<tr><td colspan=4 align=center><input type=submit name=b1 value='  �޸�  '></td></tr>";
	$s_ModiForm = $s_ModiForm.$s_SubmitButton."</table></form>";

	echo $s_AddForm.$s_ModiForm;

}

function DoToolBarAdd(){
	$s_Name = toTrim("d_name");
	$s_Order = toTrim("d_order");
	if ($s_Name == "") {
		GoError("������������Ϊ�գ�");
	}
	if (!is_numeric($s_Order)){
		GoError("��Ч�Ĺ���������ţ�����ű���Ϊ���֣�");
	}

	$nToolbarNum = count($GLOBALS["aToolbar"]) + 1;
	$GLOBALS["aToolbar"][$nToolbarNum] = $GLOBALS["sStyleID"]."||||||".$s_Name."|||".$s_Order;

	WriteConfig();
	WriteStyle($GLOBALS["sStyleID"]);

	echo "<script language=javascript>alert(\"��������".htmlspecialchars($s_Name)."�����Ӳ����ɹ���\");</script>";
	GoUrl("?action=toolbar&id=".$GLOBALS["sStyleID"]);
}

function DoToolBarModi(){

	for ($i=1;$i<=count($GLOBALS["aToolbar"]);$i++){
		$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$i]);
		if ($aCurrToolbar[0] == $GLOBALS["sStyleID"]){
			$s_Name = toTrim("d_name".$i);
			$s_Order = toTrim("d_order".$i);
			if (($s_Name == "") || (is_numeric($s_Order) == false)) {
				$aCurrToolbar[0] = "";
				$s_Name = "";
			}
			$GLOBALS["aToolbar"][$i] = $aCurrToolbar[0]."|||".$aCurrToolbar[1]."|||".$s_Name."|||".$s_Order;
		}
	}

	WriteConfig();
	WriteStyle($GLOBALS["sStyleID"]);

	echo "<script language=javascript>alert('�������޸Ĳ����ɹ���');</script>";
	GoUrl("?action=toolbar&id=".$GLOBALS["sStyleID"]);

}

function DoToolBarDel(){
	$s_DelID = toTrim("delid");
	if (is_numeric($s_DelID)){
		$GLOBALS["aToolbar"][$s_DelID] = "";
		WriteConfig();
		WriteStyle($GLOBALS["sStyleID"]);
		echo "<script language=javascript>alert('��������ID��".$s_DelID."��ɾ�������ɹ���');</script>";
		GoUrl("?action=toolbar&id=".$GLOBALS["sStyleID"]);
	}
}

function InitToolBar(){
	$b = false;
	$GLOBALS["sToolBarID"] = toTrim("toolbarid");
	if (is_numeric($GLOBALS["sToolBarID"])){
		if (((int)($GLOBALS["sToolBarID"]) <= count($GLOBALS["aToolbar"])) && ((int)($GLOBALS["sToolBarID"]) > 0)) {
			$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$GLOBALS["sToolBarID"]]);
			$GLOBALS["sToolBarName"] = $aCurrToolbar[2];
			$GLOBALS["sToolBarOrder"] = $aCurrToolbar[3];
			$GLOBALS["sToolBarButton"] = $aCurrToolbar[1];
			$b = true;
		}
	}
	if ($b == false) {
		GoError("��Ч�Ĺ�����ID�ţ���ͨ��ҳ���ϵ����ӽ��в�����");
	}
}

function ShowButtonList(){

	ShowMessage("<b class=blue>��ǰ��ʽ��<span class=red>".htmlspecialchars($GLOBALS["sStyleName"])."</span>&nbsp;&nbsp;��ǰ��������<span class=red>".htmlspecialchars($GLOBALS["sToolBarName"])."</span></b>");
	
	$s_Option1 = "";
	for ($i=1;$i<=count($GLOBALS["aButton"]);$i++){
		if ($GLOBALS["aButton"][$i][8] == 1) {
			$s_Option1 = $s_Option1."<option value='".$GLOBALS["aButton"][$i][1]."'>".$GLOBALS["aButton"][$i][2]."</option>";
		}
	}

	$aSelButton = explode("|", $GLOBALS["sToolBarButton"]);
	$s_Option2 = "";
	for ($i=0;$i<count($aSelButton);$i++){
		$s_Temp = Code2Title($aSelButton[$i]);
		if ($s_Temp != "") {
			$s_Option2 = $s_Option2."<option value='".$aSelButton[$i]."'>".$s_Temp."</option>";
		}
	}


?>

<script language=javascript>
function Add() {
	var sel1=document.myform.d_b1;
	var sel2=document.myform.d_b2;
	if (sel1.selectedIndex<0) {
		alert("��ѡ��һ����ѡ��ť��");
		return;
	}
	sel2.options[sel2.length]=new Option(sel1.options[sel1.selectedIndex].innerHTML,sel1.options[sel1.selectedIndex].value);
}

function Del() {
	var sel=document.myform.d_b2;
	var nIndex = sel.selectedIndex;
	var nLen = sel.length;
	if (nLen<1) return;
	if (nIndex<0) {
		alert("��ѡ��һ����ѡ��ť��");
		return;
	}
	for (var i=nIndex;i<nLen-1;i++) {
		sel.options[i].value=sel.options[i+1].value;
		sel.options[i].innerHTML=sel.options[i+1].innerHTML;
	}
	sel.length=nLen-1;
}

function Up() {
	var sel=document.myform.d_b2;
	var nIndex = sel.selectedIndex;
	var nLen = sel.length;
	if ((nLen<1)||(nIndex==0)) return;
	if (nIndex<0) {
		alert("��ѡ��һ��Ҫ�ƶ�����ѡ��ť��");
		return;
	}
	var sValue=sel.options[nIndex].value;
	var sHTML=sel.options[nIndex].innerHTML;
	sel.options[nIndex].value=sel.options[nIndex-1].value;
	sel.options[nIndex].innerHTML=sel.options[nIndex-1].innerHTML;
	sel.options[nIndex-1].value=sValue;
	sel.options[nIndex-1].innerHTML=sHTML;
	sel.selectedIndex=nIndex-1;
}

function Down() {
	var sel=document.myform.d_b2;
	var nIndex = sel.selectedIndex;
	var nLen = sel.length;
	if ((nLen<1)||(nIndex==nLen-1)) return;
	if (nIndex<0) {
		alert("��ѡ��һ��Ҫ�ƶ�����ѡ��ť��");
		return;
	}
	var sValue=sel.options[nIndex].value;
	var sHTML=sel.options[nIndex].innerHTML;
	sel.options[nIndex].value=sel.options[nIndex+1].value;
	sel.options[nIndex].innerHTML=sel.options[nIndex+1].innerHTML;
	sel.options[nIndex+1].value=sValue;
	sel.options[nIndex+1].innerHTML=sHTML;
	sel.selectedIndex=nIndex+1;
}

function checkform() {
	var sel=document.myform.d_b2;
	var nLen = sel.length;
	var str="";
	for (var i=0;i<nLen;i++) {
		if (i>0) str+="|";
		str+=sel.options[i].value;
	}
	document.myform.d_button.value=str;
	return true;
}

</script>

<?php


	$s_SubmitButton = "<input type=submit name=b value=' �������� '>";

	echo "<table border=0 cellpadding=5 cellspacing=0 align=center>".
		"<form action='?action=buttonsave&id=".$GLOBALS["sStyleID"]."&toolbarid=".$GLOBALS["sToolBarID"]."' method=post name=myform onsubmit='return checkform()'>".
		"<tr align=center><td>��ѡ��ť</td><td></td><td>��ѡ��ť</td><td></td></tr>".
		"<tr align=center>".
			"<td><select name='d_b1' size=20 style='width:250px' ondblclick='Add()'>".$s_Option1."</select></td>".
			"<td><input type=button name=b1 value=' �� ' onclick='Add()'><br><br><input type=button name=b1 value=' �� ' onclick='Del()'></td>".
			"<td><select name='d_b2' size=20 style='width:250px' ondblclick='Del()'>".$s_Option2."</select></td>".
			"<td><input type=button name=b3 value='��' onclick='Up()'><br><br><br><input type=button name=b4 value='��' onclick='Down()'></td>".
		"</tr>".
		"<input type=hidden name='d_button' value=''>".
		"<tr><td colspan=4 align=right>".$s_SubmitButton."</td></tr>".
		"</form></table>";


	echo "<table border=0 cellspacing=1 align=center class=list>".
		"<tr><th colspan=4>�����ǰ�ťͼƬ���ձ���������������ⰴť����ûͼ����</th></tr>";
	$n = 0;
	$m = 0;
	for ($i=1;$i<=count($GLOBALS["aButton"]);$i++){
		if ($GLOBALS["aButton"][$i][8] == 1){
			$m = $m + 1;
			$n = $m % 4;
			if ($n == 1) {
				echo "<tr>";
			}
			echo "<td>";
			if ($GLOBALS["aButton"][$i][3] != "") {
				echo "<img border=0 align=absmiddle src='../buttonimage/".$GLOBALS["sStyleDir"]."/".$GLOBALS["aButton"][$i][3]."'>";
			}
			echo $GLOBALS["aButton"][$i][2];
			echo "</td>";
			if ($n == 0) {
				echo "</tr>";
			}
		}
	}
	if ($n > 0) {
		for ($i=1;$i<=4-$n;$i++){
			echo "<td>&nbsp;</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

function Code2Title($s_Code){
	for ($i=1;$i<=count($GLOBALS["aButton"]);$i++){
		if (strtoupper($GLOBALS["aButton"][$i][1]) == strtoupper($s_Code)) {
			return $GLOBALS["aButton"][$i][2];
		}
	}
	return "";
}

function DoButtonSave(){
	$s_Button = toTrim("d_button");

	$nToolBarID = (int)($GLOBALS["sToolBarID"]);
	$aCurrToolbar = explode("|||", $GLOBALS["aToolbar"][$nToolBarID]);
	$GLOBALS["aToolbar"][$nToolBarID] = $aCurrToolbar[0]."|||".$s_Button."|||".$aCurrToolbar[2]."|||".$aCurrToolbar[3];

	WriteConfig();
	WriteStyle($GLOBALS["sStyleID"]);

	ShowMessage("<b><span class=red>��������ť���ñ���ɹ���</span></b><li><a href='?action=stylepreview&id=".$GLOBALS["sStyleID"]."' target='_blank'>Ԥ������ʽ</a><li><a href='?action=toolbar&id=".$GLOBALS["sStyleID"]."'>���ع���������</a><li><a href='?action=buttonset&id=".$GLOBALS["sStyleID"]."&toolbarid=".$GLOBALS["sToolBarID"]."'>�������ô˹������µİ�ť</a>");

}

function InitSelect($s_FieldName, $a_Name, $a_Value, $v_InitValue, $s_Sql, $s_AllName){
	$s_Result = "<select name='".$s_FieldName."' size=1>";
	if ($s_AllName != "") {
		$s_Result = $s_Result."<option value=''>".$s_AllName."</option>";
	}
	if ($s_Sql == "") {
		for ($i=0;$i<count($a_Name);$i++){
			$s_Result = $s_Result."<option value=\"".htmlspecialchars($a_Value[$i])."\"";
			if ($a_Value[$i] == $v_InitValue) {
				$s_Result = $s_Result." selected";
			}
			$s_Result = $s_Result.">".htmlspecialchars($a_Name[$i])."</option>";
		}
	}
	$s_Result = $s_Result."</select>";
	return $s_Result;
}

function WriteStyle($n_StyleID){

	$sConfig = "";
	$aTmpStyle = explode("|||", $GLOBALS["aStyle"][$n_StyleID]);
	$sConfig = $sConfig."config.ButtonDir = \"".$aTmpStyle[1]."\";\n";
	$sConfig = $sConfig."config.StyleUploadDir = \"".$aTmpStyle[3]."\";\n";
	$sConfig = $sConfig."config.InitMode = \"".$aTmpStyle[18]."\";\n";
	$sConfig = $sConfig."config.AutoDetectPasteFromWord = \"".$aTmpStyle[17]."\";\n";
	$sConfig = $sConfig."config.BaseUrl = \"".$aTmpStyle[19]."\";\n";
	$sConfig = $sConfig."config.BaseHref = \"".$aTmpStyle[22]."\";\n";
	$sConfig = $sConfig."config.AutoRemote = \"".$aTmpStyle[24]."\";\n";
	$sConfig = $sConfig."config.ShowBorder = \"".$aTmpStyle[25]."\";\n";
	$sConfig = $sConfig."config.StateFlag = \"".$aTmpStyle[16]."\";\n";
	$sConfig = $sConfig."config.CssDir = \"".$aTmpStyle[2]."\";\n";
	$sConfig = $sConfig."config.AutoDetectLanguage = \"".$aTmpStyle[27]."\";\n";
	$sConfig = $sConfig."config.DefaultLanguage = \"".$aTmpStyle[28]."\";\n";
	$sConfig = $sConfig."config.AllowBrowse = \"".$aTmpStyle[43]."\";\n";
	$sConfig = $sConfig."\n";
	$sConfig = $sConfig."function showToolbar(){\n";
	$sConfig = $sConfig."\n";

	$sConfig = $sConfig."\tdocument.write (\"";
	$sConfig = $sConfig."<table border=0 cellpadding=0 cellspacing=0 width='100%' class='Toolbar' id='eWebEditor_Toolbar'>";

	$s_Order = "";
	$s_ID = "";
	for ($n=1;$n<=count($GLOBALS["aToolbar"]);$n++){
		if ($GLOBALS["aToolbar"][$n] != "") {
			$aTmpToolbar = explode("|||", $GLOBALS["aToolbar"][$n]);
			if ((int)$aTmpToolbar[0] == $n_StyleID) {
				if ($s_ID != "") {
					$s_ID = $s_ID."|";
					$s_Order = $s_Order."|";
				}
				$s_ID = $s_ID.$n;
				$s_Order = $s_Order.$aTmpToolbar[3];
			}
		}
	}

	if ($s_ID != "") {
		$a_ID = explode("|", $s_ID);
		$a_Order = explode("|", $s_Order);
		for ($n=0;$n<count($a_Order);$n++){
			$a_Order[$n] = (int)($a_Order[$n]);
			$a_ID[$n] = (int)($a_ID[$n]);
		}
		$a_ID = doSort($a_ID, $a_Order);
		for ($n=0;$n<count($a_ID);$n++){
			$aTmpToolbar = explode("|||", $GLOBALS["aToolbar"][$a_ID[$n]]);
			$aTmpButton = explode("|", $aTmpToolbar[1]);

			$sConfig = $sConfig."<tr><td><div class=yToolbar>";
			for ($i=0;$i<count($aTmpButton);$i++){
				if (strtoupper($aTmpButton[$i]) == "MAXIMIZE") {
					$sConfig = $sConfig."\");\n";
					$sConfig = $sConfig."\n";

					$sConfig = $sConfig."\tif (sFullScreen==\"1\"){\n";
					$sConfig = $sConfig."\t\tdocument.write (\"".Code2HTML("Minimize", $aTmpStyle[1])."\");\n";
					$sConfig = $sConfig."\t}else{\n";
					$sConfig = $sConfig."\t\tdocument.write (\"".Code2HTML($aTmpButton[$i], $aTmpStyle[1])."\");\n";
					$sConfig = $sConfig."\t}\n";
					$sConfig = $sConfig."\n";

					$sConfig = $sConfig."\tdocument.write (\"";
				}else{
					$sConfig = $sConfig.Code2HTML($aTmpButton[$i], $aTmpStyle[1]);
				}
			}
			$sConfig = $sConfig."</div></td></tr>";
		}
	}else{
		$sConfig = $sConfig."<tr><td></td></tr>";
	}

	$sConfig = $sConfig."</table>\");\n";
	$sConfig = $sConfig."\n";
	$sConfig = $sConfig."}\n";

	WriteFile("../style/".strtolower($aTmpStyle[0]).".js", $sConfig);

}

function Code2HTML($s_Code, $s_ButtonDir){
	$s_Result = "";
	for ($i=1;$i<=count($GLOBALS["aButton"]);$i++){
		if (strtoupper($GLOBALS["aButton"][$i][1]) == strtoupper($s_Code)) {
			switch ($GLOBALS["aButton"][$i][5]) {
			case 0:
				$s_Result = "<DIV CLASS=".$GLOBALS["aButton"][$i][7]." TITLE='\"+lang[\"".$GLOBALS["aButton"][$i][1]."\"]+\"' onclick=\\\"".$GLOBALS["aButton"][$i][6]."\\\"><IMG CLASS=Ico SRC='buttonimage/".$s_ButtonDir."/".$GLOBALS["aButton"][$i][3]."'></DIV>";
				break;
			case 1:
				if ($GLOBALS["aButton"][$i][4] != "") {
					$s_Result = "<SELECT CLASS=".$GLOBALS["aButton"][$i][7]." onchange=\\\"".$GLOBALS["aButton"][$i][6]."\\\">".$GLOBALS["aButton"][$i][4]."</SELECT>";
				}else{
					$s_Result = "<SELECT CLASS=".$GLOBALS["aButton"][$i][7]." onchange=\\\"".$GLOBALS["aButton"][$i][6]."\\\">\"+lang[\"".$GLOBALS["aButton"][$i][1]."\"]+\"</SELECT>";
				}
				break;
			case 2:
				$s_Result = "<DIV CLASS=".$GLOBALS["aButton"][$i][7].">".$GLOBALS["aButton"][$i][4]."</DIV>";
				break;
			}
			return $s_Result;
		}
	}
	return $s_Result;
}

function DeleteFile($s_StyleName){
	@unlink("../style/".strtolower($s_StyleName).".js");
}

function isValidColor($str){
	$s_Match = "/[A-Fa-f0-9]{6}/i";
	return preg_match($s_Match, $str);
}

?>