<? class Person{
		var $name;  		 //�˵�����
		var $sex;  		 //�˵��Ա�
		var $age;  		 //�˵�����
		function say($word) //����˵���ķ���
			{echo $this->name.'����˵:'.$word;}
		function run($step) //������·�ķ���
			{echo "<br>Ȼ������".$step."��";}
		}
		
Person::run(8); 		//�������Person�������ⲿ���������Ȼ������8����		
$p1=new Person();		//������person�Ķ���$p1
echo $p1 instanceof Person				//����true
?>
