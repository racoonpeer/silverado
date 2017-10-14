<{if !empty($arrPageData.arSorting)}>
<div class="pull-right limit">
    товаров на странице:
<{foreach name=i from=$arrPageData.arLimit key=limitID item=limit}>
    <button onclick="window.location.assign('<{$limit.url}>');"<{if $limit.active}> disabled<{/if}>><{$limitID}></button>
<{/foreach}>
</div>
<{/if}>