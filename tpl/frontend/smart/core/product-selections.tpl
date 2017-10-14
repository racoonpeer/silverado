<{if !isset($title)}><{assign var=title value=""}><{/if}>
<{if !empty($arItems)}>
<div class="selections">
    <div class="container clearfix">
<{if !empty($title)}>
        <div class="h2"><{$title}></div>
<{/if}>
        <div class="product-grid slick-ready">
<{foreach from=$arItems item=arItem}>
            <{include file="core/product.tpl" item=$arItem}>
<{/foreach}>
        </div>
    </div>
</div>
<{/if}>