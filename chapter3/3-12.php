<? class Person{
		var $name;  		 //人的名字
		var $sex;  		 //人的性别
		var $age;  		 //人的年龄
		function say($word) //人有说话的方法
			{echo $this->name.'对你说:'.$word;}
		function run($step) //人有走路的方法
			{echo "<br>然后走了".$step."步";}
		}
$p1=new Person();		//创建类person的对象$p1
$p1->name="张三";  	//设置对象的属性，形式为“对象名->属性名”
$p1->say('您好'); 		//访问对象的方法，形式为“对象名->方法名”
$p1->run(5);
?>
