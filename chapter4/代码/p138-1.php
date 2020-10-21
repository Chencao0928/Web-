<?	session_start();
var_dump($_SESSION); 		//输出array(0) { }，因为没有创建Session变量
echo session_id();			//输出04c41641c2632c491c4d77d5898c0aa3
?>
