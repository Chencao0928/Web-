<? 
////ob_start(); //�򿪻����� 
////echo "Hello\n"; //��� 
//$cacheStr=file_get_contents("adminnews.php"); // 
// echo $cacheStr;
////$cacheStr=ob_get_contents();
//$handle=fopen("jb51.html","w"); 
//fwrite($handle, $cacheStr); 
//ob_clean(); 

function createStaticPage($sourcePage,$objectPage)#��Դ�ļ���Ŀ���ļ�
{
#�õ�����������һ������Դ�ļ���ַ��һ������Ҫ���ɵľ�̬ҳ���ַ
global $db; #���ݿ������õģ���$sourcePage����Ҫ�õ�

ob_start(); #�򿪻��������൱������һ��������Ŷ���������

include $sourcePage; #�ڻ��������ͷ�ҳ�棬�����������Ӧ�ÿ�������һ�㣺�Ǿ���$sourcePageҳ�浥���鿴��ʱ�����ǿ�����ʾ�ģ����ǹؼ�֮���ڣ�������治��ob_end_clean()����������ִ�г����ʱ���㿴��$sourcePageҳ������ݡ�

$cons=ob_get_contents(); #�õ��������е����ݣ���������ݾ���HTML���룡���൱�ڰ���������Ķ���ת����һ���ˣ�

ob_end_clean(); #��������������ݣ�����������Ķ���ת�����˺󣬴�ɨ����������ɨ�����ĺ���������˿��Կ������ӵĶ�����Ҳ�����Կ���$sourcePageҳ�������

$fp=fopen($objectPage,"wb") or die("��̬����ʱ���ļ�".$objectPage."ʱ����");

fwrite($fp,$cons); #��HTML����д�뾲̬�ļ��У�

fclose($fp);

return true;
}

createStaticPage("adminnews.php","jb55.html");

?> 
