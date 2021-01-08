<?
require('conn.php');
$invite_code = $_GET["invite_code"];
//在invite表中包含该邀请码且register表中不包含该邀请码，返回1
$sql_invite = "select * from invite where invite='".$invite_code."'";
$sql_register = "select * from register where invite='".$invite_code."'";

$result_invite = mysql_query($sql_invite,$conn);
$result_register = mysql_query($sql_register,$conn);

if(mysql_num_rows($result_invite)==1 && mysql_num_rows($result_register)==0){//邀请码在邀请表中，且未用用户使用该邀请码
	echo(1);
}
else{
	echo(0);
}


?>