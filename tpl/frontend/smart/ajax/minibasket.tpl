<{if !$IS_AJAX}>
<div class="minibasket" id="minibasket">
<{/if}>
<{if $Basket->isEmptyBasket()}>
    <script type="text/javascript">window.location.reload();</script>
<{else}>
    <div class="basket-items">
<{foreach name=i from=$Basket->getItems() key=arKey item=arItem}>
        <div class="item clearfix">
            <div class="pull-left image">
                <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>">
                    <img src="<{$arItem.image.small_image}>" alt=""/>
                </a>
            </div>
            <div class="title">
                <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>"><{$arItem.title}> <{$arItem.pcode}></a>
            </div>
<{if !empty($arItem.options)}>
            <div class="options">
<{foreach name=j from=$arItem.options key=optionID item=option}>
<{foreach name=z from=$option.values key=valueID item=value}>
<{if $value.selected}>
                <{$option.title}>: <{$value.title}><{if !$smarty.foreach.j.last}>, <{/if}>
<{/if}>
<{/foreach}>
<{/foreach}>
            </div>
<{/if}>
            <div class="price">
                <{$arItem.qty}> <small>шт.</small>
                <strong>
                    <{$arItem.price|number_format:0:'.':' '}>
                </strong>
            </div>
        </div>
<{/foreach}>
    </div>
    <div class="summary clearfix">
        Сумма к оплате
        <strong class="pull-right">
            <{$Basket->getTotalPrice()|number_format:0:'.':' '}>
        </strong>
    </div>
<{/if}>
<{if !$IS_AJAX}>
</div>
<{/if}>