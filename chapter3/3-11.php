<?	

class userInfo{
		public $userName;
		private $pwd;
		function __construct(){		//���幹�캯��
			$this->userName='Admin';	//Ϊ���еı�������ֵ
			$this->pwd='123';
		}
		function output(){
			echo $this->userName;
		}
}

$user=new userInfo();
echo $user->userName;		//�������еı���
$user->output();		//�������еĺ���


?>
