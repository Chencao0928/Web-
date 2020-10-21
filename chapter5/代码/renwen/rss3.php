<? require('conn.php');
//设置网页编码
header('Content-type:text/xml');
//  创建一个XML文档并设置XML版本和编码。。
$dom=new DomDocument('1.0', 'utf-8');
//  创建根节点
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
            //  创建元素
            $$key = $dom->createElement($key);
            $item->appendchild($$key);
            //  创建元素值
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);
            if (isset($attribute[$key])) {
            //  如果此字段存在相关属性需要设置
                foreach ($attribute[$key] as $akey => $row) {
                    //  创建属性节点
                    $$akey = $dom->createAttribute($akey);
                    $$key->appendchild($$akey);
                    // 创建属性值节点
                    $aval = $dom->createTextNode($row);
                    $$akey->appendChild($aval);
                }
            }   //  end if
        }
    }   //  end if
}   //  end function



?>



