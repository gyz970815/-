// alert($);
$('input[name=tel]').blur(function() {
	var tel = $(this).val();
	// console.log(tel);
	//检测是否为空
	if(tel == ''){
		$('#phone').addClass('error').html('请输入手机号');
		return false;
	};
	//正则验证
	var reg = /^1\d{10}$/;
	if(reg.test(tel)){
		$('.btn_check').removeClass('disabled');
		$('#phone').removeClass('error').html('&nbsp;');
		$('#phone').addClass('success');
		
	}else{
		$('#phone').removeClass('success');
		$('#phone').addClass('error');
		$('#phone').html('手机号格式不正确');
		return;
	}
	//发送ajax查询该手机号是否存在s
	$.get('/user/pwd',{phone:tel},function(data){
		if(data){
		$('#phone').removeClass('success');
		$('#phone').addClass('error');
		$('#phone').html('该手机号未注册');
		}
	});
	// a连接单击事件
	$('.btn_check').click(function(){
	window.location.href = "/user/findpwdb";
	});
});