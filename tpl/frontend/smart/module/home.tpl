<div class="banner-container">
    <div class="container clearfix">
        <{include file="core/banners.tpl" position=1 maxitems=1}>
        <{include file="core/banners.tpl" position=2 maxitems=2}>
    </div>
</div>
<div class="main-container">
    <div class="container clearfix">
<{assign var=int value=0}>
<{foreach from=Selections::getColumns() key=colname item=coltitle}>
<{if isset($selections[$colname]) AND !empty($selections[$colname])}>
    <{include file="core/product-selections.tpl" arItems=$selections[$colname] title=$coltitle}>
    <{$int=($int+1)}>
<{/if}>
<{/foreach}>
    </div>
</div>