<?  $foo = 'alive';
function destroy_foo() {
    global $foo;
    unset($foo); 		//�ں�����ɾ������$foo��ʵ����ֻ�Ǿֲ�������ɾ��	
}
destroy_foo();
echo $foo; 			//�Խ����alive
unset ($bar[1]);			// unsetҲ��ɾ������Ԫ��
unset ($foo1, $foo2, $foo3); 		// ͬʱɾ���������	?>
