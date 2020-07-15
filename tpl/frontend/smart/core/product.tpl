<{if !isset($ReplaceItem)}>
<div class="product-item" id="product_<{$item.id}>" data-cid="<{$item.cid}>">
<{/if}>
    <div class="wrap">
        <div class="img">
            <a href="<{include file='core/href_item.tpl' arCategory=$item.arCategory arItem=$item}>">
                <img src="<{if isset($item.image.middle_image)}><{$item.image.middle_image}><{/if}>" alt="<{$item.title}> <{$item.pcode}>" title="<{$item.title}> <{$item.pcode}>"/>
            </a>
            <{include file="core/product-sticker.tpl"}>
        </div>
<{if $item.rating > 0}>
        <div class="rating v-<{$item.rating}>"></div>
<{/if}>
        <div class="title">
            <a href="<{include file='core/href_item.tpl' arCategory=$item.arCategory arItem=$item}>"><{$item.name}></a>
        </div>
        <{include file="core/product_price.tpl"}>
    </div>
<{if !isset($ReplaceItem)}>
</div>
<{/if}>