<? require('conn.php');
//������ҳ����
header('Content-type:text/xml');
//  ����һ��XML�ĵ�������XML�汾�ͱ��롣��
$dom=new DomDocument('1.0', 'utf-8');
//  �������ڵ�
$article = $dom->createElement('article');
$dom->appendchild($article);
foreach ($data_array as $data) {
    $item = $dom->createElement('item');
    $article->appendchild($item);
    create_item($dom, $item, $data, $attribute_array);
}
echo $dom->saveXML();
function create_item($dom, $item, $data, $attribute) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            //  ����Ԫ��
            $$key = $dom->createElement($key);
            $item->appendchild($$key);
            //  ����Ԫ��ֵ
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);
            if (isset($attribute[$key])) {
            //  ������ֶδ������������Ҫ����
                foreach ($attribute[$key] as $akey => $row) {
                    //  �������Խڵ�
                    $$akey = $dom->createAttribute($akey);
                    $$key->appendchild($$akey);
                    // ��������ֵ�ڵ�
                    $aval = $dom->createTextNode($row);
                    $$akey->appendChild($aval);
                }
            }   //  end if
        }
    }   //  end if
}   //  end function



?>



