<?	$a =date(G);		//��ȡ��ǰʱ���Сʱ��
$a=floor($a/3);	//��Сʱ������4��ȡ��
switch ($a)	{
		case 2:echo "���Ϻ�";break;
		case 3:echo "�����";break;
		case 4:case 5: echo "�����";break;
		case 6:echo "���Ϻ�";break;
		default: echo "��˯����";break;
}	?>
