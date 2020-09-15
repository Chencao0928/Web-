<?	$citys=array('长沙','衡阳','常德','湘潭');
$urban=$citys;				//复制数组（传值赋值）
$urban[1]='娄底'; 			//修改新数组元素的值
print_r ($citys); 			//打印原数组
print_r ($urban); 			//打印新数组
	//下面为传地址赋值
$loc=&$citys;				//引用复制数组（传地址赋值）
$loc[1]='郴州';				//修改新数组元素的值
print_r ($citys); 			//打印原数组
print_r ($loc); 				//打印新数组
?>
