<? session_start();
 if (isset($_SESSION['user']))		//���$_SESSION['user']��Ϊ��
		echo "��ӭ����".$_SESSION["user"]."<br/>
			<a href='4-16.php?action=logout'>ע��</a> ";
else
		echo "δ��¼�û����������";		?>
