<?	ob_start(); 		//�򿪻����� 
	//ִ��php�ļ�news.php����ִ�н����html��ʽ�ַ�������������$str
$str=file_get_contents("http://localhost/php/schtml/admin/adminnews.php"); 
//include('adminnews.php');
//$str=ob_get_contents(); 
$fp=fopen("te.html","w"); 		//�����ļ�test.html
fwrite($fp, $str); 	//���ַ���$strд��test.html�У�test.html��Ϊ��̬ҳ�ļ�
ob_end_clean();			//��ջ��������ݲ��رջ�����
echo '��̬html�ļ����ɳɹ������Ŀ¼�鿴';



$root=$_SERVER['DOCUMENT_ROOT'];
echo $root;

function createhtml($sourcePage,$targetPage)#��Դ�ļ���Ŀ���ļ�
{
#�õ�����������һ������Դ�ļ���ַ��һ������Ҫ���ɵľ�̬ҳ���ַ


ob_start(); #�򿪻��������൱������һ��������Ŷ���������

$str=file_get_contents($sourcePage);  #�ڻ��������ͷ�ҳ�棬�����������Ӧ�ÿ�������һ�㣺�Ǿ���$sourcePageҳ�浥���鿴��ʱ�����ǿ�����ʾ�ģ����ǹؼ�֮���ڣ�������治��ob_end_clean()����������ִ�г����ʱ���㿴��$sourcePageҳ������ݡ�
$fp=fopen($targetPage,"w") or die("��̬����ʱ���ļ�".$targetPage."ʱ����"); 		//�����ļ�test.html
fwrite($fp, $str); 	//���ַ���$strд��test.html�У�test.html��Ϊ��̬ҳ�ļ�
ob_end_clean();			//��ջ��������ݲ��رջ�����
echo '��̬html�ļ����ɳɹ������Ŀ¼�鿴';#��������������ݣ�����������Ķ���ת�����˺󣬴�ɨ����������ɨ�����ĺ���������˿��Կ������ӵĶ�����Ҳ�����Կ���$sourcePageҳ�������



fclose($fp);

}

createhtml("http://localhost/php/schtml/admin/adminnews.php","jb.html");

?> 
