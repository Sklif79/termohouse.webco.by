{var $msto = '!msTradeOffers' | snippet}

<h1>[[*pagetitle]]</h1>
<div id="msProduct" class="row">
    <div class="col-md-6">
        <div id="msto-gallery">
            {foreach $msto.gallery as $image}
                <img src="{$image.thumb}" data-original="{$image.original}" style="width:100px;">
            {/foreach}
        </div>
    </div>
    <div class="col-md-6">
        <form class="form-horizontal ms2_form" method="post">
            <input type="hidden" name="id" value="[[*id]]"/>

            {if $msto.article}
                <div class="form-group">
                    <label class="col-md-2 control-label">[[%ms2_product_article]]:</label>
                    <div class="col-md-10 form-control-static">
                        <span class="msto-article">{$msto.article}</span>
                    </div>
                </div>
            {/if}

            {if $msto.colors}
                <div id="msto-colors" class="form-group">
                    {foreach $msto.colors as $k => $color}
                        <label>
                            <input type="radio" value="{$k}" name="options[color]" {$color.active ? 'checked' : ''}>
                            <span class="{$color.active ? 'active' : ''}">
                                <img src="{$color.thumb}" width="80px">
                                <span>{$k}</span>
                            </span>
                        </label>
                    {/foreach}
                </div>
            {/if}

            {if $msto.sizes}
                <div id="msto-sizes" class="form-group">
                    {foreach $msto.sizes as $size}
                        <label>
                            <input type="radio" value="{$size.size}" name="options[size]" {$size.active ? 'checked' : ''}>
                            <span>{$size.size}</span>
                        </label>
                    {/foreach}
                </div>
            {/if}

            {if $msto.count}
                <div class="form-group">
                    <label class="col-md-2 control-label">Остатки:</label>
                    <div class="col-md-10 form-control-static">
                        <span class="msto-count">{$msto.count}</span>
                    </div>
                </div>
            {/if}

            <div class="form-group">
                <label class="col-md-2 control-label">[[%ms2_product_price]]:</label>
                <div class="col-md-10 form-control-static">
                    <span class="msto-price">{$msto.price ?: $price}</span> руб.
                </div>
            </div>

            <div class="form-group form-inline">
                <label class="col-md-2 control-label" for="product_price">[[%ms2_cart_count]]:</label>
                <div class="col-md-10">
                    <input type="number" name="count" id="product_price" class="input-sm form-control" value="1"/>
                    [[%ms2_frontend_count_unit]]
                </div>
            </div>
            {if $msto.weight}
                <div class="form-group">
                    <label class="col-md-2 control-label">[[%ms2_product_weight]]:</label>
                    <div class="col-md-10 form-control-static">
                        <span class="msto-weight">{$msto.weight}</span> [[%ms2_frontend_weight_unit]]
                    </div>
                </div>
            {/if}
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" class="btn btn-default" name="ms2_action" value="cart/add">
                        <i class="glyphicon glyphicon-barcode"></i> [[%ms2_frontend_add_to_cart]]
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
[[*content]]