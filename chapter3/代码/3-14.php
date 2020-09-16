<?
class Person{ 		//定义父类
	function __construct($name,$sex){		//定义构造函数
		 $this->name=$name;
		 $this->sex=$sex;
	}
}
class Students extends Person{	//定义Person的子类Students
		public $school;
		function study(){ 		//定义上学的方法
			echo '我在上学<br>';		}
} 
class dxs extends Students{		//定义Students的子类dxs
function study(){ 		//定义上学的方法
		echo $this->name.'在读大学<br>';	}
}
class xxs extends Students{	//定义Students的子类xxs
function study(){ 		//定义上学的方法
		echo $this->name.'在念小学<br>';		}
}
function rightstudy($obj) {	//定义函数，该函数不属于任何类
		if ($obj instanceof Students) 		//如果该对象是Students的实例
			$obj->study();			//调用该对象的study()方法
		else	echo '出现错误！<br>';
}
$s1=new dxs('小新','男'); 	//创建dxs类的对象$s1
rightstudy($s1);
$s2=new xxs('小花','女'); 	//创建xxs类的对象$s2
rightstudy($s2);
$s3=new Students('小文','女'); 	//创建Students类的对象$s3
rightstudy($s3);
?>
