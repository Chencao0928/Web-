<?
class Person{ 		//���常��
	function __construct($name,$sex){		//���幹�캯��
		 $this->name=$name;
		 $this->sex=$sex;
		}
	function say(){ 		//����˵���ķ���
		echo '�ҽУ�'.$this->name;
		echo ' �Ա�'. $this->sex.'<br>';
		}
}
class Students extends Person{		//�������ಢ�̳и���
	public $school;
	function study($scholl){ 		//������ѧ�ķ���
		echo '����'. $scholl.'��ѧ';
		}
}
$student=new Students('С��','��');		//����һ������Ķ���
$student->say();				//���ø���ķ���
$student->study('ʯ����Ժ');			//��������ķ���
?>
