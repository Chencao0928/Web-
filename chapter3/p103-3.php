<?	function isTel($tel) 	{
			if (strlen($tel)==11 && is_numeric($tel)) 
				echo  "手机号码格式正确";
			else
		 		echo "格式不正确，请重新输入";	}	
		isTel("13388888888");		//调用有参函数	 ?>
