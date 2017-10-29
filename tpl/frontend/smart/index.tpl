<!DOCTYPE html>
<html lang="<{$lang}>">
    <{include file="core/head.tpl"}>
    <body>
        <{include file='core/mobile-menu.tpl'}>
<{if $arCategory.module=="catalog" and !empty($items)}>
        <{include file="core/filter-popup.tpl"}>
<{/if}>
        <div id="sbIndex" canvas="container">
            <{include file='core/header.tpl'}>
<{if !empty($arCategory.module)}>
            <{include file='module/'|cat:$arCategory.module|cat:'.tpl'}>
<{else}>
            <{include file='core/static.tpl'}>
<{/if}>
            <{include file='core/footer.tpl'}>
            <div class="body-overlay" onclick="Basket.close();"></div>
        </div>
        <{include file='core/basket.tpl'}>
        <{include file='core/basket-modal.tpl'}>
        <{include file='core/modal.tpl'}>
        <{include file='core/footer-extra.tpl'}>
    </body>
</html>