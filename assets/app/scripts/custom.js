$(document).ready(function () {
	//Custom modal
	var customModal = function() {
		var modal = $(".wrap-custom-modal");
		var items = $(".item-custom-modal");
		var btnClose = $(".wrap-custom-modal .icon-close");
		var html = $("html");
		var body = $("body");

		if ( items.length && modal.length ) {
			items.click(function(e) {
				e.preventDefault();
				modal.addClass("custom-modal-active");

				html.addClass("html-fixed");
				body.addClass("body-fixed");

				$(".on-scroll-fixed").css({"margin-right" : "15px"});
			});

			btnClose.click(function() {
				modal.removeClass("custom-modal-active");
				html.removeClass("html-fixed");
				$(".on-scroll-fixed").css({"margin-right" : "0"});
			});
		}
	};

	var modalGallerySlider = function () {
		var sliderMain = $(".wrap-gallery-modal .wrap-slider-main .slider");
		var sliderBottom = $(".wrap-gallery-modal .wrap-slider-bottom .slider");

		if ( sliderMain.length && sliderBottom.length ) {
			sliderMain.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				dots: false,
				swipeToSlide: true,
				adaptiveHeight: true,
				asNavFor: sliderBottom,
				infinite: false,
			});
			sliderBottom.slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				arrows: true,
				dots: false,
				appendArrows: '.wrap-gallery-modal .wrap-slider-arrows',
				asNavFor: sliderMain,
				infinite: false,
			});

			function setImgTitle (item) {
				var itemTitle = sliderBottom.find(".slider-item").eq(item).find("img").attr("data-title");
				var title = $(".wrap-gallery-modal .wrap-slider-bottom .img-title").text(itemTitle);
			}

			setImgTitle(sliderBottom.find(".slider-item").eq(0));

			sliderBottom.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
				setImgTitle(nextSlide);
			});

			$(".gallery__wrap-item").click(function() {
				var curIndex = $(this).index();
				sliderMain.slick('slickGoTo', curIndex);
				sliderBottom.slick('slickGoTo', curIndex);
			});

			sliderBottom.find(".slider-item").click(function() {
				sliderMain.slick('slickGoTo', $(this).index());
			});
		}
	};

	var orderModalTabs = function () {
		var tabs = $(".modal-order .form-tab");
		var form = $(".modal-order .form");
		
		if ( tabs.length ) {
			$('#receiver').prop('required',true);
			tabs.click(function() {
				tabs.removeClass("active");
				$(this).addClass("active");

				if ( $(this).hasClass("form-tab-type-1") ) {
					$('#receiver').prop('required',true);
					$('#kontaktnoe_lico').removeAttr('required');
					$('#unp').removeAttr('required');
					form.addClass("form-type-1");
					form.removeClass("form-type-2");
				}
				else if ( $(this).hasClass("form-tab-type-2") ) {
					$('#receiver').removeAttr('required');
					$('#kontaktnoe_lico').prop('required',true);
					$('#unp').prop('required',true);
					form.addClass("form-type-2");
					form.removeClass("form-type-1");
				}
			});
		}
	};

	var fileUploadText = () => {
		$(".wrap-modal-order .field-file").change(function(e){
			let fileName = e.target.files[0].name;

			var size = (e.target.files[0].size / 1000).toFixed(2);

			let text = `${fileName} (${size} kb)`;

			$(this).next(".file-name").text(text);
			$(this).parent().addClass("file-upload");
    });
	};

	var toggleClassColorsRow = function() {
		var items = $(".product-colors_row .product-colors_item");

		if ( items.length ) {
			items.click(function() {
				var otherItems = $(this).parent().siblings();
				otherItems.find(".product-colors_item").removeClass("product-colors_item-active");
				$(this).addClass("product-colors_item-active");
			});
		};
	};

	var SCREEN = {
		'mobile': 568,
		'mobile_hd': 768,
		'tablet': 960,
		'desktop': 1048,
		'desktop_hd': 1240,
		'desktop_hdp': 1680,
		'desktop_fhd': 1920
	};

	// $('.section-catalog__slider').slick({
	// 	adaptiveHeight: true,
	// 	slidesToShow: 4,
	// 	swipeToSlide: true,
	// 	responsive: [
	// 		{
	// 			breakpoint: SCREEN.desktop_hd,
	// 			settings: {
	// 				slidesToShow: 3
	// 			}
	// 		},
	// 		{
	// 			breakpoint: SCREEN.tablet,
	// 			settings: {
	// 				slidesToShow: 2,
	// 				arrows: false,
	// 				dots: true
	// 			}
	// 		},
	// 		{
	// 			breakpoint: SCREEN.mobile,
	// 			settings: {
	// 				slidesToShow: 1,
	// 				arrows: false,
	// 				dots: true
	// 			}
	// 		}
	// 	]
	// });

	var dropdownToggleAside = function() {
		var items = $(".nav-page__btn-dropdown");

		if ( items.length ) {
			console.log(items.length);
			items.each(function() {
				var cur = $(this);
				var curUl = cur.next("ul").length;
				if ( !curUl ) {
					cur.hide();
				}
			});

			items.click(function () {
				var cur = $(this);
				var allBtns = cur.parent().siblings();
				var allLists = $(".aside-box__wrap .nav-page > ul > li > ul");
				var curList = cur.next("ul");

				if ( curList.css("display") === "block" ) {
					allLists.slideUp(400);
					cur.removeClass("nav-page__btn-dropdown_active");
				} else {
					allBtns.find(".nav-page__btn-dropdown").removeClass("nav-page__btn-dropdown_active");
					allLists.slideUp(400);
					cur.addClass("nav-page__btn-dropdown_active");
					curList.slideDown(400);
				}

			})
		}
	};

	var fixedTableTitles = function() {
		var blocksScroll = $(".calculator__wrap-tables")

		if ( blocksScroll.length ) {
			blocksScroll.scroll(function (e) {
				var tableTitles = blocksScroll.find(".calculator__item-titles-table");
				tableTitles.css({"left": e.currentTarget.scrollLeft + "px"});
			});
		}
	};
	//Calculator END

	//set phone links href
	(function () {
		$('.main-contacts__link_tel').each(function () {
			var phone = $(this).text().trim().replace(/[^+\d]/g, '');

			$(this).attr('href', 'tel:' + phone);
		});
	})();

	fileUploadText();
	modalGallerySlider();
	orderModalTabs();
	customModal();
	toggleClassColorsRow();
	dropdownToggleAside();
	if ( $(window).width() ) fixedTableTitles();
});