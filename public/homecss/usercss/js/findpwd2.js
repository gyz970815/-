//给按钮绑定定时器
// window.trigger('click');
var code = '';
var btn = 1;
var tel =  $('input[name=tel]').val();
$('.btn_phone').click(function(){
	
	if(btn==1){
	var a = 60;
	$.get('/pcode',{phone:tel},function(data){
			// console.log(data);
			code = data;
		});
	var init = setInterval(function(){
		a = a-1;
		
		$('.btn_phone').html('重新发送('+a+')');
		$('.btn_phone').addClass('downing');
		
		
		if (a<=0){
			clearInterval(init);
			$('.btn_phone').html('重新发送');
			btn = 1;
		};
	},1000);

	};
	btn = 2;	
});

$('.btn_check').click(function(){
	var p = $('input[name=pcode]').val();
		if(p == code){
		return true;
		}else{

		alert('验证码输入错误');
		}
		return false;
});

