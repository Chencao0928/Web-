<?  //���иó�����Ҫ�Ӳ�������editform_fck.php?id=6
require('conn.php'); 
$id=intval($_GET['id']);		//����ȡ��idǿ��ת��Ϊ����
$sql="Select * from lyb where ID=$id";
$result=mysql_query($sql,$conn);	//��ʾ�����µļ�¼
$row=mysql_fetch_assoc($result);
 ?>
 <h2 align="center">��������</h2>
<form name="form1" method="post" action="edit.php?id=<?= $row['ID'];?>">
  <table border="1" align="center" cellpadding="2">
    <tr> <td width="85">���Ա��⣺</td> 
      <td width="725"><input type="text" name="title" value="<?= $row['title'];?>"> *</td>
    </tr>
    <tr><td>�����ˣ�</td>
      <td><input type="text" name="author" value="<?= $row['author'];?>"> *</td>
    </tr>
    <tr><td>��ϵ��ʽ��</td>
      <td><input type="text" name="email" value="<?= $row['email'];?>"> *</td>
    </tr>
    <tr><td valign="top">�������ݣ�</td>
      <td>
	  <? include("fckeditor/fckeditor_php5.php") ; // ��������FCKeditor���ļ�
		$oFCKeditor = new FCKeditor('content') ;  // ����FCKeditorʵ��
		$oFCKeditor->BasePath = 'fckeditor/';        // ����FCKeditorĿ¼��ַΪ��ǰĿ¼�µ�fckeditorĿ¼
		$oFCKeditor->Width='95%';                //������ʾ���
		$oFCKeditor->Height='400px';               //������ʾ�߶ȵĸ߶�
		$oFCKeditor->Value=$row['content'];
		$oFCKeditor->Create() ;                    // �����༭��	  
	   ?>
	  
</td>
    </tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="ȷ ��"></td>
    </tr>
  </table></form>
