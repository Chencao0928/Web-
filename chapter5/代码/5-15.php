<?
function page($RecordCount,$PageSize,$Page,$url,$keyword){
	$PageCount =ceil($RecordCount/$PageSize); 		//计算总页数
	$page_previous = ($Page<=1)?1:$Page-1;		//计算上一页的页数
	$page_next = ($Page>=$PageCount)?$PageCount:$Page+1;	//计算下一页的页数
	$page_start = ($Page-5>0)?$Page-5:0;		//只显示本页前5页的页码链接
	//只显示后5页的页码链接
	$page_end = ($page_start+10<$PageCount)?$page_start+10:$PageCount;	
	//若超过10页，只显示本页前后5页的页码链接
	$page_start = $page_end-10;				
	if($page_start<0) $page_start = 0;			//若当前页不合法，更正
	$parse_url = parse_url($url); 	//判断$url中是否存在查询字符串
	if(empty($parse_url["query"]))
		$url = $url.'?';			//若不存在，在$url后添加？
	else	$url = $url.'&'; 		//若存在，在$url后添加&
	if(empty($keyword)){
		if($Page== 1)		$navigator =  "[首页] [上一页] ";
	else $navigator =   " <a href='?page=1'>[首页]</a> <a href=".$url."Page= $page_previous>[上一页]</a>  ";	
	for($i=$page_start;$i<$page_end;$i++){	//输出页码链接
			$j = $i+1;
			 if ($j==$Page) $navigator = $navigator. "$j  ";
		else $navigator = $navigator. "<a href='".$url."Page=$j'>$j</a>  ";		
		}
	if($Page== $PageCount)    // 设置“下一页”链接
        $navigator = $navigator. " [下一页] [末页]";
    else $navigator = $navigator.  " <a href=".$url."Page=$page_next>[下一页]</a>  <a href=".$url."Page=$PageCount>[末页]</a> ";
		$navigator.= " &nbsp; 共".$RecordCount. "条记录&nbsp; $Page / $PageCount 页";
	}else{				//如果设置了查询关键词，则将查询关键词加到URL链接中
		$keyword = $_GET["keyword"];
	$navigator = "<a href=".$url."keyword=$keyword&Page=$page_previous>上一页</a>  ";
		for($i=$page_start;$i<$page_end;$i++){
			$j = $i+1;
		$navigator = $navigator."<a href='".$url."keyword=$keyword&Page=$j'>$j</a>  ";
		}
	$navigator =$navigator."<a href=".$url."keyword=$keyword&Page=$page_next>下一页</a> ";
	$navigator.= " &nbsp; 共".$RecordCount. "条记录&nbsp; $Page / $PageCount 页";	
	}
	echo $navigator;  		 //输出分页链接
}	?>
