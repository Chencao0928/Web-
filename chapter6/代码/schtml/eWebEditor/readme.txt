

��һ��������eWebEditor�ļ��е���Ŀ¼
��

�ڶ����������д���ŵ����ҳ��

<textarea name="d_content" style="display:none;"></textarea>
<iframe ID="eWebEditor1" src="../ewebeditor/ewebeditor.htm?id=d_content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe>

������޸�ֱ�ӰѴ������textarea�м�,��:
<textarea name="d_content" style="display:none;"><%=rs("Content")%></textarea>
<iframe ID="eWebEditor1" src="../ewebeditor/ewebeditor.htm?id=d_content&style=coolblue" frameborder="0" scrolling="no" width="550" HEIGHT="350"></iframe>


ע��iframe���idҪ�Ͷ����ı����������ͬ style�Ǳ༭������ʽ
   eWebEditor/admin�ǹ����̨���û�����������admin
����֤ʱ���Դ��Ľӿں�����
<Script Language=JavaScript>

	// ���ύ�ͻ��˼��
	function doSubmit(){
		// getHTML()ΪeWebEditor�Դ��Ľӿں���������Ϊȡ�༭��������
		if (eWebEditor1.getHTML()==""){
			alert("�������ݲ���Ϊ�գ�");
			return false;
		}
		return true;
//		document.myform.submit();
	}
</Script>