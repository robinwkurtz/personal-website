var isMobile = {
	Android: function() {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
		return navigator.userAgent.match(/iPhone|iPod|iPad/i);
	},
	Opera: function() {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() { return (
		isMobile.Android() ||
			isMobile.BlackBerry() ||
			isMobile.iOS() ||
			isMobile.Opera() ||
			isMobile.Windows() );
	}
};

var handleClick = (isMobile.any() !== null) ? "touchstart" : "click";

$(document).ready(function () {

	$('input, textarea').placeholder();
	$(".validate").validate();

	// Fixed Header Fix, Refactor
	$('.main:before').css('padding-top', $('.header').outerHeight() - 48);
	// $('.menu').css('top', $('.header').outerHeight() - 24);

	// Burger Menu
	$('.js-menu-button').on('click', function (event) {
		event.preventDefault();
		$.when($('.js-heart-menu, .js-heart-menu-button').removeClass('is-active')).done(function () {
			$('body').toggleClass('is-active');
        });
	});

	// Heart Menu
	$('.js-heart-menu-button').on('click', function (event) {
		event.preventDefault();
		$.when($('body').removeClass('is-active')).done(function () {
			$('.js-heart-menu, .js-heart-menu-button').toggleClass('is-active');
        });
	});

	$('.project-gallery').fancybox({
	    maxWidth	: 1200,
	    maxHeight	: 900,
	    fitToView	: true,
	    width		: '90%',
	    height		: '90%',
	    autoSize	: false,
	    closeClick	: false,
	    openEffect	: 'none',
	    closeEffect	: 'none',
	    padding     : 25
    });

	$('.project-gallery-link').click(function (event){
		event.preventDefault();
		trigger = $(this).data('id');
		console.log(trigger);
		$('.project-gallery').each(function (event) {
			target = $(this).data('id');
			console.log(target);
			if (trigger === target) {
				$(this).closest('.gallery-item').click();
				console.log(this);
			}
		});
	});

	// $(".project-gallery").each(function(){
	// 	$(this).fancybox({
	// 		href : $(this).attr('src'),
	// 		maxWidth	: 1200,
	// 		maxHeight	: 900,
	// 		fitToView	: true,
	// 		width		: '90%',
	// 		height		: '90%',
	// 		autoSize	: false,
	// 		closeClick	: false,
	// 		openEffect	: 'none',
	// 		closeEffect	: 'none',
	// 		padding     : 25
	// 	});
	// });

});

$(window).on('resize', function(e) {

});

// var resizeTimer;
// clearTimeout(resizeTimer);
// resizeTimer = setTimeout(function() {

// }, 250);
