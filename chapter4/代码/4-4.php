<html><body>
	<h1 align="center">新用户注册</h1>
	<form method="Post" action="4-5.php">
	姓名：<input type="text" name="name"><br>
	性别：<input type="radio" name="Sex" value="1" checked="checked">男
		  <input type="radio" name="Sex" value="0">女<br>
	爱好：<input type="checkbox" name="hobby[]" value="太极拳">太极拳
			  <input type="checkbox" name="hobby[]" value="音乐">音乐
			  <input type="checkbox" name="hobby[]" value="旅游">旅游<br>
	职业：<select name="career">
				  <option value="教育业">教育业</option>
				  <option value="医疗业">医疗业</option>
				  <option value="其他">其他</option>
		</select><br>
	个性签名：<textarea name="intro" rows="2" cols="20"></textarea><br>
		<input type="submit" value="  提 交　">
	</form>
</body></html>
