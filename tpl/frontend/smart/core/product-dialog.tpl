<div class="product-dialog clearfix">
    <div class="product-title">
        <a href="<{include file="core/href_item.tpl" arCategory=$item.arCategory arItem=$item params=""}>"><{$item.name}></a>
    </div>
    <div class="pull-left product-image">
        <div class="screen">
            <a href="<{include file="core/href_item.tpl" arCategory=$item.arCategory arItem=$item params=""}>" data-original="<{$item.image.big_image}>">
                <img src="<{$item.image.middle_image}>" alt=""/>
            </a>
        </div>
    </div>
    <div class="product-flypage details clearfix">
        <{include file="core/product-sticker.tpl"}>
<{*if !empty($item.descr)}>
        <div class="product-descr">
            <{$item.descr}>&ensp;
            <a href="<{include file="core/href_item.tpl" arCategory=$item.arCategory arItem=$item params=""}>" class="read-more">подробнее о товаре</a>
        </div>
<{/if*}>
        <{include file="core/buy_button.tpl" list=false}>
<{foreach from=$item.options key=optionID item=option}>
        <div class="options">
            <form>
                <{include file="core/_option.tpl" list=false types=array("select","radio", "image")}>
            </form>
        </div>
<{/foreach}>
    </div>
</div>