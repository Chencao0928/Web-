<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>第3题</title>
</head>

<body>
	<form name="send" action="rec.php" method="post">
		姓名<input type = "text" name="name" size="12"><br/>
		性别：男<input type = "radio" name="Sex" value="男">女<input type = "radio" name="Sex" value="女"><br/>
		爱好：唱歌<input type = "checkbox" name="hobby[]" value="唱歌">
		跳舞<input type = "checkbox" name="hobby[]" value="跳舞">
		游泳<input type = "checkbox" name="hobby[]" value="游泳">
		跑步<input type = "checkbox" name="hobby[]" value="跑步"><br/>
		职业：<select name="career">
			<option>医生</option>
			<option>老师</option>
			<option>律师</option>
			<option>公务员</option>
		</select><br/>
		<input type="submit" name="btn_sub" value="确定">
	</form>
	
	
</body>
</html>