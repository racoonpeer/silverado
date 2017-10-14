<div class="pull-right product-related clearfix">
    <div class="h1"><{$item.title}> <{$item.pcode}></div>
    <div class="product-image">
        <div class="screen">
            <a href="<{include file="core/href_item.tpl" arCategory=$item.arCategory arItem=$item params=""}>">
                <img src="<{$item.image.middle_image}>" alt="<{$item.title}> <{$item.pcode}>"/>
            </a>
        </div>
    </div>
    <div class="product-flypage">
        <div class="reviews">
            <div class="rating<{if $item.rating > 0}> v-<{$item.rating}><{/if}>"></div>
        </div>
<{foreach from=$item.options key=optionID item=option}>
        <div class="options">
            <form>
                <{include file="core/_option.tpl" list=false types=array("select","radio", "image")}>
            </form>
        </div>
<{/foreach}>
        <{include file="core/product_price.tpl"}>
        <{include file="core/buy_button.tpl" list=true}>
    </div>
</div>