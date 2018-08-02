jQuery(document).ready(function ($) {
	
		
		$(".fancybox").fancybox({
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'easingIn': 'fade',
			'easingOut': 'fade',
			'nextEffect': 'fade',
			'prevEffect':'fade',
			'padding': 5
		});

		$(".menu-toggle").click(function() {
			$(".menu-main-menu-container").slideToggle();
		});

		$(".menu-toggle").click(function() {
			$('#nav-icon').toggleClass('open');
		});

		var navcontainer = $('.nav-menu');			
		$(window).resize(function(){
			var width = $(window).width();
			if (width > 767 && navcontainer.is(':hidden')){
				navcontainer.removeAttr('style');
			}
		});

		$('.bxslider').bxSlider({
			'auto': true,
			'pause': 6000,
			'pager': false,
			'speed': 1000,
			'controls': false,
			'mode': 'fade'
		});

		$('a[href*="\\#"]:not([href="\\#"])').click(function() {
		   if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {

			 var target = $(this.hash);
			 target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			 if (target.length) {
			   $('html,body').animate({
				 scrollTop: target.offset().top
			   }, 500);
			   return false;
			 }
		   }
		 });
	
	
	$('.flowtype').flowtype({
		fontRatio : 15
	}); 
	
	
	var positions = [];
	var index = 0;
	var max;
	var isMoving = false;
	var count = 0;
	
	
	
	$(window).resize(function(){
		
		getScrollPositions();
	});
	
	function getScrollPositions() {
		positions.length = 0;
		count = 0;
		$('.scrolldiv').each(function(){
			if(count === 0){
				positions.push(0);
			}else{
				positions.push($(this).offset().top);
			}
			count++;
						 
		});
		max = positions.length;
		console.log(count + ": " + positions[0] + ", " + positions[1] + ", " + positions[2] + ", " + positions[3] + ", ");
	}
	
	$('.scrolldiv').each(function(){
			if(count === 0){
				positions.push(0);
			}else{
				if( navigator.userAgent.toLowerCase().indexOf('firefox') > -1 ){
						positions.push($(this).offset().top+90);
				} else {
					positions.push($(this).offset().top);
				}
			}
			count++;
						 
		});
		max = positions.length;
		console.log(count + ": " + positions[0] + ", " + positions[1] + ", " + positions[2] + ", " + positions[3] + ", ");
	
	
	$('html, body').animate({ scrollTop: 0 }, 0);
	
	$('html').mousewheel(function(event, delta) {
		
		var width = $(window).width();
		
		if (width > 767){
			event.preventDefault();
			if(!isMoving) {
				isMoving = true;
				if(event.deltaY > 0){
					// move down
					index = index-1;
					if(index < 0){
						index = 0;	
					}


				}else{
					// move up	
					index = index +1;
					isMoving = true;
					if(index > max){
						index = max;	
					}
				}


				$('html, body').animate({
						scrollTop: positions[index]
					}, 1000, 'easeInOutQuad', function() {	
						isMoving = false;
				});
			}
		}
		
	});
	
	$(".videofancybox").fancybox({
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'width'				: 1200,
		'height'			: 560,
		'autoScale'			: true,
		'titlePosition' 	: 'outside',
		'type'				: 'iframe'
	});
	
	

});