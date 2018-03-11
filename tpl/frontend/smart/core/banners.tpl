<{* REQUIRE VARS: $position=int[1|2|3|4], $maxitems=mixed[int|bool]; <{include file='core/banners.tpl' position=2 maxitems=false}> *}>
<{assign var='arrItems' value=$Banners->getBanners($position, $maxitems)}>
<{section name=i loop=$arrItems max=$maxitems}>
<{if $position==1}>
<div class="item left-side">
    <{$arrItems[i].content}>
</div>
<{elseif $position==2}>
<div class="item right-side">
    <{$arrItems[i].content}>
</div>
<{else}>
<{$arrItems[i].content}>
<{/if}>
<{/section}>