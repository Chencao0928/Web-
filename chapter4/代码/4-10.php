<html><body>
<?	 $flag=$_GET["flag"]; 		//��ȡurl����flag��ֵ
if ($flag=='1') 
		echo '��ӭ '.$_POST['user']. ' ����!';
else	 	//û�а��ύ��ťʱ
		echo '<form method="post" action="?flag=1">
 			������<input name="user" type="text" size="15" />
 			<input type="submit" value="�ύ" />
			</form>';		?>
</body></html>
