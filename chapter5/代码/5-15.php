<?
function page($RecordCount,$PageSize,$Page,$url,$keyword){
	$PageCount =ceil($RecordCount/$PageSize); 		//������ҳ��
	$page_previous = ($Page<=1)?1:$Page-1;		//������һҳ��ҳ��
	$page_next = ($Page>=$PageCount)?$PageCount:$Page+1;	//������һҳ��ҳ��
	$page_start = ($Page-5>0)?$Page-5:0;		//ֻ��ʾ��ҳǰ5ҳ��ҳ������
	//ֻ��ʾ��5ҳ��ҳ������
	$page_end = ($page_start+10<$PageCount)?$page_start+10:$PageCount;	
	//������10ҳ��ֻ��ʾ��ҳǰ��5ҳ��ҳ������
	$page_start = $page_end-10;				
	if($page_start<0) $page_start = 0;			//����ǰҳ���Ϸ�������
	$parse_url = parse_url($url); 	//�ж�$url���Ƿ���ڲ�ѯ�ַ���
	if(empty($parse_url["query"]))
		$url = $url.'?';			//�������ڣ���$url����ӣ�
	else	$url = $url.'&'; 		//�����ڣ���$url�����&
	if(empty($keyword)){
		if($Page== 1)		$navigator =  "[��ҳ] [��һҳ] ";
	else $navigator =   " <a href='?page=1'>[��ҳ]</a> <a href=".$url."Page= $page_previous>[��һҳ]</a>  ";	
	for($i=$page_start;$i<$page_end;$i++){	//���ҳ������
			$j = $i+1;
			 if ($j==$Page) $navigator = $navigator. "$j  ";
		else $navigator = $navigator. "<a href='".$url."Page=$j'>$j</a>  ";		
		}
	if($Page== $PageCount)    // ���á���һҳ������
        $navigator = $navigator. " [��һҳ] [ĩҳ]";
    else $navigator = $navigator.  " <a href=".$url."Page=$page_next>[��һҳ]</a>  <a href=".$url."Page=$PageCount>[ĩҳ]</a> ";
		$navigator.= " &nbsp; ��".$RecordCount. "����¼&nbsp; $Page / $PageCount ҳ";
	}else{				//��������˲�ѯ�ؼ��ʣ��򽫲�ѯ�ؼ��ʼӵ�URL������
		$keyword = $_GET["keyword"];
	$navigator = "<a href=".$url."keyword=$keyword&Page=$page_previous>��һҳ</a>  ";
		for($i=$page_start;$i<$page_end;$i++){
			$j = $i+1;
		$navigator = $navigator."<a href='".$url."keyword=$keyword&Page=$j'>$j</a>  ";
		}
	$navigator =$navigator."<a href=".$url."keyword=$keyword&Page=$page_next>��һҳ</a> ";
	$navigator.= " &nbsp; ��".$RecordCount. "����¼&nbsp; $Page / $PageCount ҳ";	
	}
	echo $navigator;  		 //�����ҳ����
}	?>
