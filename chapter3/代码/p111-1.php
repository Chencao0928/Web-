<? class Person{
		var $name;  		 //人的名字
		var $sex;  		 //人的性别
		var $age;  		 //人的年龄
		function say($word) //人有说话的方法
			{echo $this->name.'对你说:'.$word;}
		function run($step) //人有走路的方法
			{echo "<br>然后走了".$step."步";}
		}
		
Person::run(8); 		//将其放在Person类代码的外部，将输出“然后走了8步”		
$p1=new Person();		//创建类person的对象$p1
echo $p1 instanceof Person				//返回true
?>
