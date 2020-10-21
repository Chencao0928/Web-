<script>
   var pics="",links="",texts="";
<?
$sql="select * from NEWS where firstImageName<>'' and ok=true order by ID DESC limit 5";
$result=$conn->query($sql); 
 while($row=$result->fetch_assoc()){ 
    $pics.="uppic/".$row['firstImageName']."|";
	$links.="ONEWS.php?id=".$row['ID']."|";
	$texts.=Trimtit($row['title'],16)."|";
		}
		$pics=substr($pics,0,-1);
		$links=substr($links,0,-1);
		$texts=substr($texts,0,-1);
?>

	var pics="<?= $pics ?>";
	var links="<?= $links ?>";
	var texts="<?= $texts ?>";

	
	var focus_width=320 	//定义图片轮显框的宽
	var focus_height=240	//定义图片轮显框的高
	var text_height=14	//定义下面文字区域的高
	var swf_height = focus_height+text_height	//定义整个FLash的高
	
	
	document.write('<object ID="focus_flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
	document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="images/pixviewer.swf"><param name="quality" value="high"><param name="bgcolor" value="#ffffff">');
	document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
	document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'">');
	document.write('<embed ID="focus_flash" src="images/pixviewer.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');		
	document.write('</object>');

</script>