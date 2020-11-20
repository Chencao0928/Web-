<h2 align="center">添加新闻页面</h2>
<form method="post" action="add.php">
  <table width="600" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tbody bgcolor="#ffffff">
    <tr><td width="125">新闻标题：</td>
      <td width="475"><input type="text" name="title" size="30"></td></tr>
    <tr><td>发布者：</td>
      <td><input type="text" name="author"></td> </tr>
    <tr><td>所属栏目：</td>
      <td><input type="text" name="lanmu"></td></tr>
    <tr><td>新闻内容：</td>
      <td><textarea name="content" cols="30" rows="3"></textarea></td></tr>
	 <tr><td></td><td><input type="submit" name="Submit" value="提交"></td></tr>
	</tbody>
  </table></form>
