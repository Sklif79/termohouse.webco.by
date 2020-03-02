$(document).on('msoptionsprice_product_action', function (e, action, form, r) {
    if (action == 'modification/get' && r.success && r.data) {
        var m = r.data.modification || {};

        var thumbs = m.thumbs || {main: ['default.png']};
        var fotorama = $(form).closest(msOptionsPrice.Product.parent).find('.fotorama').data('fotorama');

        if (fotorama) {
            var images = [];
            (thumbs.main || []).filter(function (href) {
                images.push({img: href, caption: ''})
            });
            fotorama.load(images);
        }
    }
});


$(document).on('msoptionsprice_product_action', function (e, action, form, r) {
    if (action == 'modification/get' && r.success && r.data) {
        var m = r.data.modification || {};
        var thumbs = m.thumbs || {main: ['default.png']};

        if (thumbs.main[0]) {
            var img = $(form).find('.true img');
            img.attr('src', thumbs.main[0]);
        }
    }
});


$(document).on('msoptionsprice_product_action', function (e, action, form, r) {
    if (action == 'modification/get' && r.success && r.data) {
        var m = r.data.modification || {};

        if (!m.cost) {
            setTimeout((function () {
                $(form).find('.msoptionsprice-cost').html('<p>Цена по согласованию</p>');
            }.bind(this)), msOptionsPrice.timeout);
        }

    }
});

$(document).on('msoptionsprice_product_action', function (e, action, form, r) {
    if (action === 'modification/get' && r.success && r.data) {
        var m = r.data.modification || {};
        var o = r.data.options || {};

        var cartButton = $(form).find('button[value="cart/add"]');

        if (!m['count']) {
            cartButton.attr('disabled', true).prop('disabled', true);
            miniShop2.Message.error('нет в наличии');
        }
        else {
            cartButton.attr('disabled', false).prop('disabled', false);
        }
    }
});
