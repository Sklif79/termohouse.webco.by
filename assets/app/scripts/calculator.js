$(document).ready(function () {
	//Calculator START
	var fixedCalcBottomInfo = function() {
		var bottomInfoFixed = $(".calculator__info-line_bottom");
		var bottomInfo = $(".calculator__info-line");
		var bottomInfoHeight = bottomInfo.outerHeight(true);
		var offsetBlock = bottomInfo.offset().top;
		var windowHeight = $(window).height();

		function checkOffset () {
			var curOffset = $(document).scrollTop() + windowHeight - bottomInfoHeight;

			if ( curOffset < offsetBlock ) {
				bottomInfoFixed.addClass("calculator__info-line_fixed");
			} else {
				bottomInfoFixed.removeClass("calculator__info-line_fixed");
			}
		}

		if ( bottomInfo.length ) {
			checkOffset();
			$(window).scroll(function () {
				checkOffset();
			});
		}
	};

	$('.calculator__btn').click(function() {
		getTotal();
	});

	var getTotal = function () {
		output = '';
		$('.calculator__step-1 .calculator__select-item').each(function() {
			output += 'Серия: ' + $(this).find('.calculator__select-item-title').text() + ';;';
			$($(this).data('calc')).each(function() {
				$($(this).find('.calculator__step-2 .calculator__item-table')).each(function() {
					pagetitle = 'Рамка: ' + $(this).find('.calculator__item-table-title').text() + ';;';
					flag=true;
					$(this).find('.total').each(function() {
						if (parseFloat($(this).text()) > 0) {
							if (flag) {
								output += pagetitle;
							}
							flag=false;
							output += 'Товар: ' + $(this).siblings('.name').text() + ', количество:' + $(this).siblings('.count').find('.calculator__table-count').text() + ', цена:' + $(this).siblings('.price').text() + ' BYN;;';
						}
					});
				});
				$($(this).find('.calculator__step-4 .calculator__item-table')).each(function() {
					pagetitle = 'Цвет: ' + $(this).find('.calculator__item-table-title').text() + ';;';
					flag=true;
					$(this).find('.total').each(function() {
						if (parseFloat($(this).text()) > 0) {
							if (flag) {
								output += pagetitle;
							}
							flag=false;
							output += 'Товар: ' + $(this).siblings('.title_tov').text() + ', количество:' + $(this).siblings('.counter').find('.calculator__table-count').text() + ', цена ' + $(this).siblings('.price').text() + ';;';
						}
					});
				});
			});
		});
		output += 'ИТОГО: ' + $('.calculator__info-line-title em .total_price').html();
		$("#json").val(output);
	};

	var fieldCountProduct = function () {
		var wrapCounter = $('.calculator__table-count-controls');
		var btns = wrapCounter.find(".calculator__table-count-control");

		if ( btns.length ) {

			btns.click(function () {
				var curText = $(this).siblings(".calculator__table-count");
				var curTextVal = +curText.text();
				var curBtn = $(this);
				var price = $(this).parent().parent().siblings(".price").text();
				var total = $(this).parent().parent().siblings(".total");
				console.log(price,total);
				if ( curBtn.hasClass("calculator__table-count-less") && curTextVal > 0 ) {
					curText.text(curTextVal -= 1);
				} else if ( curBtn.hasClass("calculator__table-count-plus") && curTextVal < 999 ) {
					curText.text(curTextVal += 1);
				}
				price = price.replace(/,/gi, '.');
				var totalval = parseFloat(curText.text()) * parseFloat(price);
				totalval = Math.ceil(totalval*100)/100;
				totalval = totalval.toString().replace(/\./gi, ',');
				total.text(totalval);
				calc_total();
			});

		}
	};
	var calc_total = function() {
		var total_price = 0;
		$('.calculator__item-table:not(.hidden) .total').each(function( index ) {
			if (parseFloat($(this).text())) {
				var price_line = $(this).text();
				price_line = price_line.replace(/,/gi, '.');
				total_price += parseFloat(price_line);
			}
		});
		total_price = total_price.toString().replace(/\./gi, ',');
		$('.total_price').text(total_price);
	};

	var selectsItemsToggleClass = function() {
		var itemsColors = $(".calculator__step-3 .calculator__select-item");
		var itemsChangeContent = $(".calculator__step-1 .calculator__select-item")

		if ( itemsColors.length ) {
			itemsColors.click(function() {
				var wrap = $(this).closest(".calculator__row-selects-items");
				var curItems = wrap.find(".calculator__select-item");
				$(this).toggleClass("calculator__select-item_active");

				var category = $(this).data('category');
				$('.calculator__step-4 .calculator__item-table'+$(this).data('color-id')).toggleClass('hidden');
				var activeitems = $('.calculator__select-items'+category+' .calculator__select-item_active');
				if (activeitems.length) {
					$('.calculator__content'+category+' .calculator__step-4 .calculator__info-text-subtext').addClass('hidden');
					$('.calculator__content'+category+' .calculator__step-4 .calculator__wrap-tables').removeClass('hidden');
				} else {
					$('.calculator__content'+category+' .calculator__step-4 .calculator__info-text-subtext').removeClass('hidden');
					$('.calculator__content'+category+' .calculator__step-4 .calculator__wrap-tables').addClass('hidden');
				}
				calc_total();
			});
		}

		if ( itemsChangeContent.length ) {
			itemsChangeContent.click(function() {
				var key = $(this).attr("data-content");
				$(".calculator__content").removeClass("calculator__content_active");
				$(".calculator__content[data-content=" + key + "]").addClass("calculator__content_active");		

				var wrap = $(this).closest(".calculator__row-selects-items");
				var curItems = wrap.find(".calculator__select-item");
				curItems.removeClass("calculator__select-item_active");
				$(this).addClass("calculator__select-item_active");
			});
		}



	};

	$( ".calculator__step-2 .calculator__btn-delete" ).click(function() {
		var table = $(this).parents(".calculator__item-table");
		var category = $(this).data('category');
		table.addClass('hidden');
		$('.calculator__modal-border'+table.data('border-id')).removeClass('.calculator__select-item_active');
		var activeitems = $('.calculator__modal'+category+' .calculator__modal-border_active');
		if (activeitems.length) {
			$('.calculator__content'+category+' .calculator__step-2 .calculator__info-text-subtext').addClass('hidden');
			$('.calculator__content'+category+' .calculator__step-2 .calculator__wrap-tables').removeClass('hidden');
		} else {
			$('.calculator__content'+category+' .calculator__step-2 .calculator__info-text-subtext').removeClass('hidden');
			$('.calculator__content'+category+' .calculator__step-2 .calculator__wrap-tables').addClass('hidden');
		}
		calc_total();
	});

	$( ".calculator__step-4 .calculator__btn-delete" ).click(function() {
		var table = $(this).parents(".calculator__item-table");
		var category = $(this).data('category');
		table.addClass('hidden');
		$('.calculator__select-item'+table.data('color-id')).removeClass('calculator__select-item_active');
		console.log(table.data('color-id'));
		var activeitems = $('.calculator__select-items'+category+' .calculator__select-item_active');
		if (activeitems.length) {
			$('.calculator__content'+category+' .calculator__step-4 .calculator__info-text-subtext').addClass('hidden');
			$('.calculator__content'+category+' .calculator__step-4 .calculator__wrap-tables').removeClass('hidden');
		} else {
			$('.calculator__content'+category+' .calculator__step-4 .calculator__info-text-subtext').removeClass('hidden');
			$('.calculator__content'+category+' .calculator__step-4 .calculator__wrap-tables').addClass('hidden');
		}
		calc_total();
	});

	var selectsItemsModal = function() {
		var items = $(".calculator__modal-border");

		if ( items.length ) {
			items.click(function() {
				$(this).toggleClass("calculator__modal-border_active");
				var category = $(this).data('category');
				$('.calculator__step-2 .calculator__item-table'+$(this).data('border-id')).toggleClass('hidden');
				var activeitems = $('.calculator__modal'+category+' .calculator__modal-border_active');
				if (activeitems.length) {
					$('.calculator__content'+category+' .calculator__step-2 .calculator__info-text-subtext').addClass('hidden');
					$('.calculator__content'+category+' .calculator__step-2 .calculator__wrap-tables').removeClass('hidden');
				} else {
					$('.calculator__content'+category+' .calculator__step-2 .calculator__info-text-subtext').removeClass('hidden');
					$('.calculator__content'+category+' .calculator__step-2 .calculator__wrap-tables').addClass('hidden');
				}
				calc_total();
			});
		}

	};



	$(document).on('af_complete', function(event, response) {
    console.log(response)
		var modals = $(".calculator__modal");
		var html = $("html");
		var body = $("body");
		modals.removeClass("calculator__modal_active");
		html.removeClass("html-fixed");
		body.removeClass("body-fixed");
	});


	var showModal = function () {
		var btns = $(".calculator__btn");
		var btnCloseModal = $(".calculator__modal-close-btn, .calculator__modal-btn-ready");
		var modals = $(".calculator__modal");
		var html = $("html");
		var body = $("body");

		if ( btns.length && btnCloseModal.length ) {
			btns.click(function() {
				var key = $(this).attr("data-modal-key");
				html.addClass("html-fixed");
				body.addClass("body-fixed");

				$(".calculator__modal[data-modal-key=" + key + "]").addClass("calculator__modal_active");
			});

			btnCloseModal.click(function() {
				modals.removeClass("calculator__modal_active");
				html.removeClass("html-fixed");
				body.removeClass("body-fixed");
			});
		}
	};


	//Calculator START
	showModal();
	selectsItemsModal();
	fixedCalcBottomInfo();
	selectsItemsToggleClass();
	fieldCountProduct();
	//Calculator END


});