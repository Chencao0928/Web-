<? session_start();
if (isset($_POST["submit"]))	{		//�ж��Ƿ񵥻��˵�¼��ť
  	$user=$_POST["userName"];
		$pw=$_POST["PW"];
	if ($user=="admin" && $pw=='123'){		//�ж��û��������Ƿ���ȷ
		$_SESSION['user']=$user;		//���û�������$_SESSION['user']�����ǹؼ�
		header('Location:4-15.php');}
	else	echo "�û������������";		
 }
else  echo '
<form method="post" action="">
  �û�����<input type="text" name="userName" />
  �� �룺<input type="password" name="PW" />
  <input name="submit" type="submit" value="��¼" />
</form>'; 		?>
