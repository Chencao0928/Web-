<?	

class userInfo{
		public $userName;
		private $pwd;
		function __construct(){		//定义构造函数
			$this->userName='Admin';	//为类中的变量赋初值
			$this->pwd='123';
		}
		function output(){
			echo $this->userName;
		}
}

$user=new userInfo();
echo $user->userName;		//访问类中的变量
$user->output();		//访问类中的函数


?>
