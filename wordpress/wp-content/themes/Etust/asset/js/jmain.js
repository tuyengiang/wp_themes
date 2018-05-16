$(document).ready(function(){
	$('.btn-bars').click(function(){
		$('.menu-fixed').show(300);
	});
	$('.btn-exit').click(function(){
		$('.menu-fixed').hide(300);
	});
});

$(document).ready(function(){
	$(window).scroll(function(){
		$(window).scroll(function(){
			if($(this).scrollTop()>200){
				$('.header').addClass("header-fixed");
			}else{
				$('.header').removeClass("header-fixed");
			}
		});
	});
});



$(document).ready(function(){
	$(window).scroll(function(){
		if($(this).scrollTop()>200){
			$('.back').show(300);
		}else{
			$('.back').hide(300);
		}
	});
	$('.back').click(function(){
		$('html,body').animate({
			scrollTop:0
		},300);
		return false;
	});
});