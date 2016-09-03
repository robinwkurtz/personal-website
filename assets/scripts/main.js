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

	// Fixed Header Fix, Refactor
	$('.main').css('padding-top', $('.header').outerHeight() - 24);
	$('.menu').css('top', $('.header').outerHeight() - 24);

	// Mobile Burger Menu
	$('.js-menu-button').on('click', function (event) {
		event.preventDefault();
		$('body').toggleClass('is-active');
	});

});

$(window).on('resize', function(e) {

});

// var resizeTimer;
// clearTimeout(resizeTimer);
// resizeTimer = setTimeout(function() {

// }, 250);
