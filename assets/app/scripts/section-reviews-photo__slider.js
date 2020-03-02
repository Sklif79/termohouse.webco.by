$(document).ready(function () {
	$('.section-reviews-photo__slider').slick({
		adaptiveHeight: true,
		slidesToShow: 3,
		swipeToSlide: true,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive: [
			{
				breakpoint: SCREEN.tablet,
				settings: {
					arrows: false,
					dots: true
				}
			},
			{
				breakpoint: SCREEN.mobile_hd,
				settings: {
					arrows: false,
					dots: true,
					slidesToShow: 2
				}
			},
			{
				breakpoint: SCREEN.mobile,
				settings: {
					arrows: false,
					dots: true,
					slidesToShow: 1
				}
			}
		]
	});
});
