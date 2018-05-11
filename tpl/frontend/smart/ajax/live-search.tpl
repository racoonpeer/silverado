<{if !empty($items)}>
<div class="live-search">
    <div class="items">
<{section name=i loop=$items}>
        <div class="item clearfix">
            <div class="pull-left img">
                <a href="<{include file='core/href_item.tpl' arCategory=$items[i].arCategory arItem=$items[i]}>">
                    <img src="<{$items[i].image.small_image}>" alt="<{$items[i].name}>"/>
                </a>
            </div>
            <div class="info">
                <a class="title" href="<{include file='core/href_item.tpl' arCategory=$items[i].arCategory arItem=$items[i]}>"><{$items[i].name}></a>
                <{include file='core/product_price.tpl' item=$items[i]}>
            </div>
        </div>
<{/section}>
    </div>
    <a class="show-all" href="<{include file='core/href.tpl' arCategory=$arrModules.search}>?q=<{$searchtext}>" class="results">Все результаты</a>
</div>
<{/if}>