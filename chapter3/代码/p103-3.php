<?	function isTel($tel) 	{
			if (strlen($tel)==11 && is_numeric($tel)) 
				echo  "�ֻ������ʽ��ȷ";
			else
		 		echo "��ʽ����ȷ������������";	}	
		isTel("13388888888");		//�����вκ���	 ?>
