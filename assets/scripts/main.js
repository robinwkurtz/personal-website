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

	// Burger Menu
	$('.js-menu-button').on('click touchstart', function (event) {
		event.preventDefault();
		$.when($('.js-heart-menu, .js-heart-menu-button').removeClass('is-active')).done(function () {
			var resizeTimer;
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {
				$('body').toggleClass('is-active');
			}, 150);
        });
	});

	// Heart Menu
	$('.js-heart-menu-button').on('click touchstart', function (event) {
		event.preventDefault();
		$.when($('body').removeClass('is-active')).done(function () {
			var resizeTimer;
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {
				$('.js-heart-menu, .js-heart-menu-button').toggleClass('is-active');
			}, 150);
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
		$('.project-gallery').each(function (event) {
			target = $(this).data('id');
			if (trigger === target) {
				$(this).closest('.gallery-item').click();
			}
		});
	});

});

$(window).on('resize', function(e) {
	$('.js-heart-menu, .js-heart-menu-button').removeClass('is-active');
});

// var resizeTimer;
// clearTimeout(resizeTimer);
// resizeTimer = setTimeout(function() {

// }, 250);
