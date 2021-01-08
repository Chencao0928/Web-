//输入密码时遮眼
$('#password').focusin(function () {
    $('form').addClass('up')
})
$('#password').focusout(function () {
    $('form').removeClass('up')
})

// 眼睛移动
$(document).on('mousemove', function (event) {
    var dw = $(document).width() / 30
    var dh = $(document).height() / 30
    var x = event.pageX / dw
    var y = event.pageY / dh
	
	$('.eye-ball').css({
	width: x,
	height: y
	})

})

// 表单验证
$('.btn').click(function () {
    $('form').addClass('wrong-entry')
    setTimeout(function () {
        $('form').removeClass('wrong-entry')
    }, 3000)
})