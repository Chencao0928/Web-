��������Ϸ��
<?
if(!isset($_POST['sub']))				//�ж��ύ��ť�Ƿ��£�������button=�ύ
$a=rand(1,10);		//ʹ��rand()��������һ�������
$b=5;
?>
<?
if(isset($_POST['sub']))				//�ж��ύ��ť�Ƿ��£�������button=�ύ
{
		$SZ=$_POST["SZ"];					//�����ı���SZ��ֵ
		$a=$_POST["rand"];	
		$b=$_POST["last"];						//ʹ��rand()��������һ�������
		$b--;
		if($SZ>$a)								//��������ֵ����������бȽ�
			echo "�´��ˣ��㻹�� $b �λ���";
		elseif($SZ<$a)
			echo "��С�ˣ��㻹�� $b �λ���";
		else { $c=5-$b;
			echo "���¶��������� $c �λ���";
			unset($_POST['sub']);}
}
?>					
<form method="post" action="">	��������(1-10)<br />
	<input type="text" name="SZ" size="6">
	<input name="rand" type="hidden" value="<?= $a ?>" />	<!--����²�ǰ�����������-->
	<input name="last" type="hidden" value="<?= $b ?>" />	<!--����ʣ��������-->
	<input type="submit" name="sub" value="ȷ��">
</form>

