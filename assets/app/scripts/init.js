var SCREEN = {
	'mobile': 568,
	'mobile_hd': 768,
	'tablet': 960,
	'desktop': 1048,
	'desktop_hd': 1240,
	'desktop_hdp': 1680,
	'desktop_fhd': 1920
};

var ACTIVE = 'is-active';

function addActiveByClick(sel) {
	$(sel).click(function () {
		$(sel).removeClass(ACTIVE);
		$(this).toggleClass(ACTIVE);
	});
}
function addRemoveActiveByClick(sel) {
	$(sel).click(function () {
		$(this).toggleClass(ACTIVE);
	});
}
function checkWidth() {
	if ($(window).width() >= SCREEN.desktop) {
		var a = $('.page-lines_header').outerHeight();
		var b = $('.page-lines_footer').outerHeight();
		var d = $('.page').css('margin-top');
		var i = $('.page').css('margin-bottom');
		var c = a + b + parseInt(d) + parseInt(i);
		$('.page__space').css({'min-height': 'calc(100vh - ' + c + 'px)'});
	}
	if ($(window).width() <= SCREEN.tablet) {
		if ($('.m-control').hasClass(ACTIVE)) {
			$('.m-menu').css({'display': 'block'});
		} else {
			$('.m-menu').css({'display': 'none'});
		}
	} else {
		$('.m-menu').fadeIn(200);
		$(window).scroll(function() {
			var plHeaderOuterH = $('.page-lines_header .page-lines__first').outerHeight();

			if ($(this).scrollTop() >= plHeaderOuterH) {
				$('#on-scroll-fixed').addClass('on-scroll-fixed');
			}
			else {
				$('#on-scroll-fixed').removeClass('on-scroll-fixed');
			}
		});
	}
}

function blockEntitledAcord() {
	$('.entitled-acord').not('.is-active').find('.entitled-acord__wrap').hide();

	$('.entitled-acord__control').on('click', function (e) {
		var parent = $(this).parent();
		if (parent.hasClass(ACTIVE)) {
			parent.removeClass(ACTIVE);
			$(this).siblings('.entitled-acord__wrap').slideUp(300);
		} else {
			parent.addClass(ACTIVE);
			$(this).siblings('.entitled-acord__wrap').slideDown(300);
		}
	});
}

function blockReview() {
	$('.review__button').on('click', function () {
		var text = $(this).siblings().find('.review__text');

		if (text.hasClass(ACTIVE)) {
			text.removeClass(ACTIVE);
			$(this).children('.btn__label').text('Подробнее');
		} else {
			text.addClass(ACTIVE);
			$(this).children('.btn__label').text('Свернуть');
		}
	});
}

$(document).ready(function () {
	

	checkWidth();
	$(window).resize(checkWidth);

	$('.m-control').on('click', function (e) {
		if ($(this).hasClass(ACTIVE)) {
			$('.m-menu').fadeOut(200);
			$(this).removeClass(ACTIVE);
		}
		else {
			$('.m-menu').fadeIn(200);
			$(this).addClass(ACTIVE);
		}
	});

	$('.aside-box_acord .aside-box__title').on('click', function (e) {
		$(this).siblings('.aside-box__wrap').slideToggle();
	});

	blockEntitledAcord();
	blockReview();

	$('body').magnificPopup({
		delegate: '[data-mfp-open]',
		type: 'image',
		tLoading: 'Загрузка #%curr%...',
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true,
			tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
		}
	});

	$('.product__view-item').zoom({
		magnify: 2
	});

	$('.product__view').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		swipeToSlide: true,
		adaptiveHeight: true,
		asNavFor: '.product__view-nav'
	});

	$('.product__view-nav').slick({
		slidesToShow: 3,
		swipeToSlide: true,
		asNavFor: '.product__view',
		centerMode: true,
		focusOnSelect: true,
		responsive: [
			{
				breakpoint: SCREEN.desktop,
				settings: {
					arrows: false
				}
			}
		]
	});

	$('.section-catalog__slider').slick({
		adaptiveHeight: true,
		slidesToShow: 4,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: SCREEN.desktop_hd,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: SCREEN.tablet,
				settings: {
					slidesToShow: 2,
					arrows: false,
					dots: true
				}
			},
			{
				breakpoint: SCREEN.mobile,
				settings: {
					slidesToShow: 1,
					arrows: false,
					dots: true
				}
			}
		]
	});

	$('.product-hits').slick({
		adaptiveHeight: true,
		slidesToShow: 4,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: SCREEN.desktop_hd,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: SCREEN.tablet,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: SCREEN.mobile,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	$('.section-news__slider').slick({
		adaptiveHeight: true,
		slidesToShow: 3,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: SCREEN.tablet,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: SCREEN.mobile,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	$('.section-reviews__slider').slick({
		adaptiveHeight: true,
		slidesToShow: 1,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: SCREEN.tablet,
				settings: {
					arrows: false,
					dots: true
				}
			}
		]
	});

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

	$('.section-evo__slider').on('init', function (event, slick) {
		var bgUrl = $(slick.$slides[0]).attr('data-bg');
		var useFog = $(slick.$slides[0]).attr('data-bg-fog');
		$('.section-evo').css({'background-image': 'url(' + bgUrl + ')'});
		if (useFog === 'true') {
			$('.section-evo').addClass('section-evo_fog');
		}
		else {
			$('.section-evo').removeClass('section-evo_fog');
		}
	});

	$('.section-evo__slider').slick({
		adaptiveHeight: true,
		slidesToShow: 1,
		swipeToSlide: true,
		responsive: [
			{
				breakpoint: SCREEN.desktop_hd,
				settings: {
					arrows: false,
					dots: true
				}
			}
		]
	});

	$('.section-evo__slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		var bgUrl = $(slick.$slides[nextSlide]).attr('data-bg');
		var useFog = $(slick.$slides[nextSlide]).attr('data-bg-fog');
		$('.section-evo').css({'background-image': 'url(' + bgUrl + ')'});
		if (useFog === 'true') {
			$('.section-evo').addClass('section-evo_fog');
		}
		else {
			$('.section-evo').removeClass('section-evo_fog');
		}
	});


	var PAGE_NAV_HEIGHT = $('#on-scroll-fixed').outerHeight() - 1;
	var PAGE_NAV_LINK = $('.nav-main__link');
	PAGE_NAV_LINK.click(function(e) {
		var href = $(this).attr("href");
		var offsetTop = href === "#" ? 0 : $(href).offset().top - PAGE_NAV_HEIGHT;
		$('html').stop().animate({
			scrollTop: offsetTop
		}, 700);
		e.preventDefault();
	});

	var $price = $("#price");
	var $inputFrom = $('#p1');
	var $inputTo = $('#p2');

	function updateInputs(data) {
		$inputFrom.prop("value", data.from);
		$inputTo.prop("value", data.to);
	}

	$price.ionRangeSlider({
		type: "double",
		grid: false,
		force_edges: true,
		onFinish: updateInputs
	});

	$inputFrom.prop("value", $price.data('min'));
	$inputTo.prop("value", $price.data('max'));

});

