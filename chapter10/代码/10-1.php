<?
header("Content-type: text/html; charset=utf-8"); 
include('conn.php');
$result=$conn->query("Select * From lyb limit 4 "); 
while($row=$result->fetch_assoc()){  
 echo "<tr><td>".$row['title']."</td>";
     echo "<td>".$row['content']."</td>";
    echo " <td>".$row['author']."</td>";
     echo " <td>".$row['email']."</td>";
    echo "<td>".$row['ip']."</td></tr>";
}	
?>

