<div class="product-set">
    <div class="h2">Купить комплект</div>
    <div class="product-set-blocks">
<{foreach name=i from=$item.kits item=kitItem}>
        <div class="product-set-block">
            <div class="product-set-items">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
<{foreach name=e from=$kitItem.elements item=element}>
                        <div class="swiper-slide product-set-item clearfix">
                            <div class="product-set-item-image">
<{if $element.id != $item.id}>
                                <a href="<{include file="core/href_item.tpl" arCategory=$element.arCategory arItem=$element params=""}>">
<{/if}>
                                <img src="<{$element.image.middle_image}>" alt=""/>
<{if $element.id != $item.id}>
                                </a>
<{/if}>
                            </div>
                            <div class="product-set-item-info">
                                <div class="product-set-item-title">
<{if $element.id != $item.id}>
                                    <a href="<{include file="core/href_item.tpl" arCategory=$element.arCategory arItem=$element params=""}>">
<{/if}>
                                    <{$element.name}>
<{if $element.id != $item.id}>
                                    </a>
<{/if}>
                                </div>
                                <div class="product-set-item-price">
                                    <strong><{$element.price|number_format:0:'.':' '}></strong>
                                </div>
                            </div>
                        </div>
<{/foreach}>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
            <div class="product-set-summary">
                <div class="price">
<{if !empty($kitItem.old_price) and $kitItem.old_price > $kitItem.price}>
                    <span class="strike">
                        <strong><{$kitItem.old_price|number_format:0:'.':' '}></strong>
                    </span>
<{/if}>
                    <strong><{$kitItem.price|number_format:0:'.':' '}></strong>
                </div>
                <button class="btn btn-l btn-danger add-to-cart<{if $Basket->isSetKey($kitItem.idKey)}> in-cart<{/if}>" 
                    data-key="<{$kitItem.idKey}>" 
                    data-url="<{include file='core/href_item.tpl' arCategory=$kitItem.arCategory arItem=$kitItem}>" 
                    onclick="<{if $Basket->isSetKey($kitItem.idKey)}>Basket.open();<{else}>Basket.openDialog($(this).data('url'));<{/if}>"
                    data-text="Купить" data-alt="<{$smarty.const.IN_CART}>">
                </button>
            </div>
        </div>
<{/foreach}>
    </div>
</div>