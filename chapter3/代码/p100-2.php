<?  $foo = 'alive';
function destroy_foo() {
    global $foo;
    unset($foo); 		//在函数中删除变量$foo，实际上只是局部变量被删除	
}
destroy_foo();
echo $foo; 			//仍将输出alive
unset ($bar[1]);			// unset也能删除数组元素
unset ($foo1, $foo2, $foo3); 		// 同时删除多个变量	?>
