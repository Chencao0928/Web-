<? $history=$_COOKIE["history"];		//��ȡ��¼�����ʷ��Cookies
	if ($history=="")		//��������ʷΪ��
		$path=$title;			//����ǰҳ�ı��Ᵽ�浽path������
	else
		$path=$title."/".$history;		//����ǰҳ�ı���ӵ������ʷ����ǰ��	
	//��$path���浽Cookie������,���ù���ʱ��Ϊ30��
	setcookie("history",$path,time()+30*3600);	
	$arrPath=explode("/",$path);			//��$path�ָ��һ������$arrPath
echo "������������ʷ��<hr/>";
foreach ($arrPath as $key=>$value){
		if($key>9) break;					//ֻ��������10��
		echo ($key+1) .". ". $value ."<br/>";		//��������ʷ
}?>
