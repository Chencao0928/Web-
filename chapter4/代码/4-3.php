<html><body>
<form method="post" action="">
  �û���:<input type="text" name="userName"  size="12">
  ����:<input type="text" name="PS"  size="10">
  <input type="submit" name="denglu" value="��½">
</form>
<?
if(isset($_POST['denglu'])) {			//�ж��û��Ƿ��ύ�˱������������ύ��ť��
	$userName=$_POST["userName"];
	$PS=$_POST["PS"];
	echo "��������û�����:".$userName;
	echo "<br>�������������:".$PS;	}	?>
</body></html>
