
<?  require('../conn.php');
$id=intval($_GET['id']);	

$query="select * from news where ID= $id";
$query.="select * from BigClass";
$conn->multi_query($query);
$result=$conn->store_result();
if($result)
$row=$result->fetch_assoc();

?>
 <h2 align="center">��������</h2>
<form method="post" action="save.php?id=<?= $row['ID'] ?>">
  <table width="400" border="1" align="center" cellpadding="2">
    <tr> <td width="125">���Ա��⣺</td> 
      <td width="275"><input type="text" name="title" value="<?= $row['title'] ?>"> *</td>
    </tr>
	<tr> <td width="125">�������ͣ�</td> 
      <td width="275"><select name="clas">
	  
        <option  value="<%= rs2("class") %>" <% if rs2("class")=rs("class") then response.Write "selected"%>><%= rs2("class") %></option>
		
			loop 
			rs2.close
			set rs2=nothing		%></select>  *</td></tr>
    <tr><td>�����ˣ�</td>
      <td><input type="text" name="author" value="<?= $row['user'] ?>"> *</td>
    </tr>
    <tr><td>��ϵ��ʽ��</td>
      <td><input type="text" name="email" value="<?= $row['date'] ?>"> *</td>
    </tr>
    <tr><td>�������ݣ�</td>
      <td><textarea name="content" cols="30" rows="2"><?= $row['content'] ?></textarea>
</td></tr>
	 <tr><td>&nbsp;</td> <td><input type="submit" value="ȷ ��"></td></tr>
</table></form>
