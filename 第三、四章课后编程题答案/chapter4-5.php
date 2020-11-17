<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第5题</title>
</head>

<body>
	<?php
		if(isset($_POST["btn_sub"])){
			$right_ans = array("PHP","ASP","JSP");
			//var_dump($_POST["arr_lang"]);
			//var_dump($right_ans);
			
			if(have_wrong_ans($_POST["arr_lang"],$right_ans)){//若同时出现包含错误答案和缺少答案的情况，优先输出答案错误
				$res="答案错误";
				
			}
			
			else if(count($_POST["arr_lang"])<count($right_ans)){//输入答案缺少
				$res="答案不全";
				
			}
			
			else {//输入答案正确
				$res = "回答正确";
				
			}
			echo $res;
			
		}
	function have_wrong_ans($in_arr,$right_arr){
		foreach($in_arr as $key=>$value){
			if(!in_array($value,$right_arr)){
					return true;
				}
		}
		return false;
	}
	
	
	?>
	
	<form method="post" action="">
		1.以下属于Web开发的语言有哪几种？<br/>
		Ajax<input name="arr_lang[]" type="checkbox" value="Ajax">
		PHP<input name="arr_lang[]" type="checkbox" value="PHP">
		FLASH<input name="arr_lang[]" type="checkbox" value="FLASH">
		ASP<input name="arr_lang[]" type="checkbox" value="ASP">
		JSP<input name="arr_lang[]" type="checkbox" value="JSP">
		<input type="submit" value="确定" name="btn_sub">
	</form>
	
	
</body>
</html>