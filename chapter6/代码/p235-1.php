<?	$num=0;                 //$num����ͳ����Ŀ¼���ļ�������
	$dir='fnnews';            	//$dir��������Ҫ������Ŀ¼��
	$dirh=opendir($dir);       		//��opendir��Ŀ¼
	?>
<table border="1" width="600">
<caption><b>Ŀ¼<?= $dir?>�е�����</b></caption>
<tr align="left" bgcolor="#cccccc">
<th>�ļ���</th><th>��С</th><th>����</th><th>�޸�ʱ��</th></tr>
	<?
while($file=readdir($dirh)) {    		//ʹ��readdirѭ����ȡĿ¼�������
	if($file!="." && $file!="..") {  
		$dirFile=$dir."/".$file;      	//��Ŀ¼�µ��ļ��͵�ǰĿ¼��������
		$num++;
		echo '<tr bgcolor='.$bgcolor.'>';            	//����п�ʼ��ǣ���ʹ�ñ���ɫ
		echo '<td>'.$file.'</td>';                   	//��ʾ�ļ���
     echo '<td>'.filesize($dirFile).'</td>';         //��ʾ�ļ���С
     echo '<td>'.filetype($dirFile).'</td>';         //��ʾ�ļ�����
    echo '<td>'.date("Y/n/t",filemtime($dirFile)).'</td></tr>';       //��ʾ�޸�ʱ��
         	}}
closedir($dirh);                               //�ر��ļ��������
	?></table> 
��<b><?= $dir?></b>Ŀ¼�µ���Ŀ¼���ļ�����<b><?= $num?></b>��
