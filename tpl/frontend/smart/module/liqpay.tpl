<div class="page-container container clearfix <{if empty($arrPageData.form)}>progress<{/if}>">
    <h1 class="heading-title"><{$arCategory.title}></h1>
<{if !empty($arrPageData.form)}>
    <{$arrPageData.form}>
<{elseif !empty($arrPageData.messages) or !empty($arrPageData.errors)}>
    <div class="<{if !empty($arrPageData.messages)}>messages<{elseif !empty($arrPageData.errors)}>errors<{/if}>">
<{if !empty($arrPageData.messages)}>
        <{$arrPageData.messages|implode:"<br>"}>
<{elseif !empty($arrPageData.errors)}>
        <{$arrPageData.errors|implode:"<br>"}>
<{/if}>
    </div>
    <{assign var=viewed value=$HTMLHelper->getLastWatched($UrlWL)}>
<{if !empty($viewed)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$viewed title="Товары которые вы недавно смотрели"}>
<{/if}>
<{/if}>
</div>