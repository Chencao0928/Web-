<h3 align="center">多文件上传功能演示</h3>
<p>请选择要上传的三张图片文件</p> 
<form action="4-26.php" method="post" enctype="multipart/form-data">
	文件1：<input type="file" name="upfile[]" /><br><br>
	文件2：<input type="file" name="upfile[]" /><br><br>
	文件3：<input type="file" name="upfile[]" /><br><br>
  <input type="submit" value=" 上 传 " />
</form>
