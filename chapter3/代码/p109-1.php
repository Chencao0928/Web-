<?	class Mystr{				//定义Mystr类，注意类名后面没有小括号
		var $str;
		function output(){
			echo 'Hello PHP';
		}	
}	

class userInfo{
		public $userName;
		private $pwd;
		function output(){
		  echo $this-> userName;
		}
}



?>
