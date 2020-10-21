<?  //运行该程序需要加参数，如editform_fck.php?id=6
require('conn.php'); 
$id=intval($_GET['id']);		//将获取的id强制转换为整型
$sql="Select * from lyb where ID=$id";
$result=mysql_query($sql,$conn);	//显示待更新的记录
$row=mysql_fetch_assoc($result);
 ?>
 <h2 align="center">更新留言</h2>
<form name="form1" method="post" action="edit.php?id=<?= $row['ID'];?>">
  <table border="1" align="center" cellpadding="2">
    <tr> <td width="85">留言标题：</td> 
      <td width="725"><input type="text" name="title" value="<?= $row['title'];?>"> *</td>
    </tr>
    <tr><td>留言人：</td>
      <td><input type="text" name="author" value="<?= $row['author'];?>"> *</td>
    </tr>
    <tr><td>联系方式：</td>
      <td><input type="text" name="email" value="<?= $row['email'];?>"> *</td>
    </tr>
    <tr><td valign="top">留言内容：</td>
      <td>
	  <? include("fckeditor/fckeditor_php5.php") ; // 用于载入FCKeditor类文件
		$oFCKeditor = new FCKeditor('content') ;  // 创建FCKeditor实例
		$oFCKeditor->BasePath = 'fckeditor/';        // 设置FCKeditor目录地址为当前目录下的fckeditor目录
		$oFCKeditor->Width='95%';                //设置显示宽度
		$oFCKeditor->Height='400px';               //设置显示高度的高度
		$oFCKeditor->Value=$row['content'];
		$oFCKeditor->Create() ;                    // 创建编辑器	  
	   ?>
	  
</td>
    </tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="确 定"></td>
    </tr>
  </table></form>
