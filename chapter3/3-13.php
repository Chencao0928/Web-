<?
class Person{ 		//定义父类
	function __construct($name,$sex){		//定义构造函数
		 $this->name=$name;
		 $this->sex=$sex;
		}
	function say(){ 		//定义说话的方法
		echo '我叫：'.$this->name;
		echo ' 性别：'. $this->sex.'<br>';
		}
}
class Students extends Person{		//定义子类并继承父类
	public $school;
	function study($scholl){ 		//定义上学的方法
		echo '我在'. $scholl.'上学';
		}
}
$student=new Students('小新','男');		//创建一个子类的对象
$student->say();				//调用父类的方法
$student->study('石鼓书院');			//调用子类的方法
?>
