<? class Person{
		var $name;  		 //�˵�����
		var $sex;  		 //�˵��Ա�
		var $age;  		 //�˵�����
		function say($word) //����˵���ķ���
			{echo $this->name.'����˵:'.$word;}
		function run($step) //������·�ķ���
			{echo "<br>Ȼ������".$step."��";}
		}
$p1=new Person();		//������person�Ķ���$p1
$p1->name="����";  	//���ö�������ԣ���ʽΪ��������->��������
$p1->say('����'); 		//���ʶ���ķ�������ʽΪ��������->��������
$p1->run(5);
?>
