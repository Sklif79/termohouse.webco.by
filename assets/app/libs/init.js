'use strict';

const SCREEN = {
	'mobile': 568,
	'mobile_hd': 768,
	'tablet': 960,
	'desktop': 1048,
	'desktop_hd': 1240,
	'desktop_hdp': 1680,
	'desktop_fhd': 1920
};

const ACTIVE = 'is-active';



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
		let a = $('.page-lines_header').outerHeight();
		let b = $('.page-lines_footer').outerHeight();
		let d = $('.page').css('margin-top');
		let i = $('.page').css('margin-bottom');
		let c = a + b + parseInt(d) + parseInt(i);
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
			const plHeaderOuterH = $('.page-lines_header .page-lines__first').outerHeight();

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
		const parent = $(this).parent();
		if (parent.hasClass(ACTIVE)) {
			parent.removeClass(ACTIVE);
			$(this).siblings('.entitled-acord__wrap').slideUp(300);
		} else {
			parent.addClass(ACTIVE);
			$(this).siblings('.entitled-acord__wrap').slideDown(300);
		}
	});
}

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


function blockReview() {
	$('.review__button').on('click', function () {
		const text = $(this).siblings().find('.review__text');
		const text2 = $(this).siblings().find('.slideT');

		if (text.hasClass(ACTIVE)) {
			text.removeClass(ACTIVE);
			$(this).children('.btn__label').text('Подробнее');
			text2.hide();
	
			
		} else {
			text.addClass(ACTIVE);
			$(this).children('.btn__label').text('Свернуть');
			text2.slideToggle("slow");

		}
	});
}

(function quantityProducts() {
   
  $(".counter").find(".y1").click(function () {
    var calc = $(this).parent().find(".counter__val");
    var calcText = calc.val();
    if ($(this).hasClass("minus") && calcText > 1) {
      calc.val(+calcText - 1);
    }
    else if ($(this).hasClass("plus")) {
      calc.val(+calcText + 1);
    }
  });

 
})();



(function q2() {
   
  $(".c2").find(".y2").click(function () {
    var calc = $(this).parent().find(".cl2");
    var calcText = calc.val();
    if ($(this).hasClass("minus2") && calcText > 1) {
      calc.val(+calcText - 1);
    }
    else if ($(this).hasClass("plus2")) {
      calc.val(+calcText + 1);
    }
  });

 
})();


$(".switcher__true").change(function() { 
	
	if($(this).attr('data-kab_0')&&$(this).attr('data-zash_0')) { 
		if(!this.checked) { 
			
			alert("2");
			
		}
	}

if($(this).attr('data-kab_0')) { 
if(this.checked) { 
 document.getElementById('mse2_msoption|kts').style.display="block";
 document.getElementById('mse2_msoption|type_lot').style.display="block";
 document.getElementById('mse2_msoption|hei_lot').style.display="block";
 document.getElementById('mse2_msoption|wid_lot').style.display="block";
 document.getElementById('mse2_msoption|pod_k').style.display="block";
 document.getElementById('mse2_msoption|mat').style.display="block";
 document.getElementById('mse2_msoption|vbs').style.display="block";
 document.getElementById('mse2_msoption|vid_syst2').style.display="block";
 document.getElementById('mse2_msoption|bss').style.display="block";
 document.getElementById('mse2_msoption|type_og').style.display="block";
 document.getElementById('mse2_msoption|class_og').style.display="block";
 document.getElementById('mse2_msoption|min_og').style.display="block";
 

} else { 
document.getElementById('mse2_msoption|kts').style.display="none";
 document.getElementById('mse2_msoption|type_lot').style.display="none";
 document.getElementById('mse2_msoption|hei_lot').style.display="none";
 document.getElementById('mse2_msoption|wid_lot').style.display="none";
 document.getElementById('mse2_msoption|pod_k').style.display="none";
 document.getElementById('mse2_msoption|mat').style.display="none";
 document.getElementById('mse2_msoption|vbs').style.display="none";
 document.getElementById('mse2_msoption|vid_syst2').style.display="none";
 document.getElementById('mse2_msoption|bss').style.display="none";
 document.getElementById('mse2_msoption|type_og').style.display="none";
 document.getElementById('mse2_msoption|class_og').style.display="none";
 document.getElementById('mse2_msoption|min_og').style.display="none";
 
 
 
} 


}



if($(this).attr('data-zash_0')) { 
if(this.checked) { 
 
 document.getElementById('mse2_msoption|tbs').style.display="block";
 document.getElementById('mse2_msoption|el_mol').style.display="block";
 document.getElementById('mse2_msoption|el_mat').style.display="block";
 document.getElementById('tyspec_0').style.display="block";
 

} else { 

 document.getElementById('mse2_msoption|tbs').style.display="none";
 document.getElementById('mse2_msoption|el_mol').style.display="none";
 document.getElementById('mse2_msoption|el_mat').style.display="none";
 document.getElementById('tyspec_0').style.display="none";
 
} 


} 




if($(this).attr('data-all_of_0')) { 
if(this.checked) { 
 
 
 document.getElementById('mse2_msoption|ufs').style.display="block";
 document.getElementById('mse2_msoption|of_pol').style.display="block";
 document.getElementById('mse2_msoption|of_ub').style.display="block";
 document.getElementById('mse2_msoption|of_mat').style.display="block";
 document.getElementById('mse2_msoption|of_col').style.display="block";
 document.getElementById('tyof_kol_0').style.display="block";
 document.getElementById('mse2_msoption|cor_type').style.display="block";
 document.getElementById('mse2_msoption|cor_is').style.display="block";
 document.getElementById('mse2_msoption|cor_shir').style.display="block";
 document.getElementById('mse2_msoption|cor_gl').style.display="block";
 document.getElementById('mse2_msoption|sys_type').style.display="block";
 document.getElementById('mse2_msoption|lfs').style.display="block";
 document.getElementById('mse2_msoption|egs').style.display="block";

} else { 

 document.getElementById('mse2_msoption|ufs').style.display="none";
 document.getElementById('mse2_msoption|of_pol').style.display="none";
 document.getElementById('mse2_msoption|of_ub').style.display="none";
 document.getElementById('mse2_msoption|of_mat').style.display="none";
 document.getElementById('mse2_msoption|of_col').style.display="none";
 document.getElementById('tyof_kol_0').style.display="none";
 document.getElementById('mse2_msoption|cor_type').style.display="none";
 document.getElementById('mse2_msoption|cor_is').style.display="none";
 document.getElementById('mse2_msoption|cor_shir').style.display="none";
 document.getElementById('mse2_msoption|cor_gl').style.display="none";
 document.getElementById('mse2_msoption|sys_type').style.display="none";
 document.getElementById('mse2_msoption|lfs').style.display="none";
 document.getElementById('mse2_msoption|egs').style.display="none";
} 


} 



});

$(document).ready(function () {
	
	




    $(".slideT").hide();
  

$('#r1').click(function() {
  setTimeout(
         function() {
             location.reload();
        }, 2000
        );

});

$('#r2').click(function() {
  setTimeout(
         function() {
             location.reload();
        }, 2000
        );

});

$('.product-colors_row input').on('change', function() {
 $('input', '.product-colors_row').parent().removeClass('product-colors_item-active');
 $('input:checked', '.product-colors_row').parent().addClass('product-colors_item-active'); 
});
	


$('#lo').click(function() {
  setTimeout(
         function() {
          var inst = $.remodal.lookup[$('[data-remodal-id=rr]').data('remodal')];
   
    inst.open();
        }, 2000
        );

});

$('#fg').click(function() {
 
          var inst = $.remodal.lookup[$('[data-remodal-id=rr2]').data('remodal')];
   
    inst.open();

});

$('#qw').click(function() {
 
          var inst = $.remodal.lookup[$('[data-remodal-id=rr3]').data('remodal')];
   
    inst.open();

});


$('#ery').click(function() {
  setTimeout(
         function() {
              var inst = $.remodal.lookup[$('[data-remodal-id=rr2]').data('remodal')];
   
    inst.close();
        }, 2000
        );

});

$('#lk').click(function() {
  setTimeout(
         function() {
              var inst = $.remodal.lookup[$('[data-remodal-id=rr3]').data('remodal')];
    inst.close();
        }, 2000
        );

});



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

	$('.fotorama228').zoom({
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

	$('.section-evo__slider').on('init', function (event, slick) {
		let bgUrl = $(slick.$slides[0]).attr('data-bg');
		let useFog = $(slick.$slides[0]).attr('data-bg-fog');
		$('.section-evo').css({'background-image': 'url(' + bgUrl + ')'});
		if (useFog === 'true') {
			$('.section-evo').addClass('section-evo_fog');
		}
		else {
			$('.section-evo').removeClass('section-evo_fog');
		}
	});
	$('.section-evo__slider').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		infinite: true,
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
		let bgUrl = $(slick.$slides[nextSlide]).attr('data-bg');
		let useFog = $(slick.$slides[nextSlide]).attr('data-bg-fog');
		let autoplaySpeed = ($(slick.$slides[nextSlide]).attr('data-speed') * 1000);
		$('.section-evo').css({'background-image': 'url(' + bgUrl + ')'});
		if (useFog === 'true') {
			$('.section-evo').addClass('section-evo_fog');
		}
		else {
			$('.section-evo').removeClass('section-evo_fog');
		}
		if (autoplaySpeed) {
			$('.section-evo__slider').slick('setOption', 'autoplaySpeed', autoplaySpeed);
		}
	});

	const PAGE_NAV_HEIGHT = $('#on-scroll-fixed').outerHeight() - 1;
	const PAGE_NAV_LINK = $('.nav-main__link');
	PAGE_NAV_LINK.click(function(e) {
		let href = $(this).attr("href");
		let offsetTop = href === "#" ? 0 : $(href).offset().top - PAGE_NAV_HEIGHT;
		$('html').stop().animate({
			scrollTop: offsetTop
		}, 700);
		e.preventDefault();
	});
	
	
	const $price = $("#price");
	const $inputFrom = $('#p1');
	const $inputTo = $('#p2');

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

	updateInputs($price);
	

});
