<?  
session_start();  
require('conn.php');	//上半部分显示留言的代码
$mesg=unescape($_POST['message']);
//echo $mesg;
$sql="INSERT INTO messages VALUES ( null,'".$_SESSION['user']."', '".$mesg."' )";  
if ($conn->query($sql)) echo 1;
?>