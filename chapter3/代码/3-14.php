<?
class Person{ 		//���常��
	function __construct($name,$sex){		//���幹�캯��
		 $this->name=$name;
		 $this->sex=$sex;
	}
}
class Students extends Person{	//����Person������Students
		public $school;
		function study(){ 		//������ѧ�ķ���
			echo '������ѧ<br>';		}
} 
class dxs extends Students{		//����Students������dxs
function study(){ 		//������ѧ�ķ���
		echo $this->name.'�ڶ���ѧ<br>';	}
}
class xxs extends Students{	//����Students������xxs
function study(){ 		//������ѧ�ķ���
		echo $this->name.'����Сѧ<br>';		}
}
function rightstudy($obj) {	//���庯�����ú����������κ���
		if ($obj instanceof Students) 		//����ö�����Students��ʵ��
			$obj->study();			//���øö����study()����
		else	echo '���ִ���<br>';
}
$s1=new dxs('С��','��'); 	//����dxs��Ķ���$s1
rightstudy($s1);
$s2=new xxs('С��','Ů'); 	//����xxs��Ķ���$s2
rightstudy($s2);
$s3=new Students('С��','Ů'); 	//����Students��Ķ���$s3
rightstudy($s3);
?>
