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

});

$(window).on('resize', function(e) {
	$('.js-heart-menu, .js-heart-menu-button').removeClass('is-active');
});

// var resizeTimer;
// clearTimeout(resizeTimer);
// resizeTimer = setTimeout(function() {

// }, 250);
