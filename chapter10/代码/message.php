<?  
session_start(); 
header("Content-type: text/xml; charset=utf-8");  
?>  
<messagelist>  
<?  
require('conn.php');	//上半部分显示留言的代码


$result=$conn->query('SELECT * FROM messages where message_id >'.intval($_POST["lastid"]) );  
while( $field=$result->fetch_array() ) {  
?>  
<message>  
    <id><?php echo($field[0]) ?></id>  
     <user><?php echo($field[1])?></user>  
    <msg><?php echo($field[2]) ?></msg>  
</message>  
<?php  
}  
?>
</messagelist>