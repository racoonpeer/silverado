<!DOCTYPE html>
<html lang="<{$lang}>">
    <{include file="core/head.tpl"}>
    <body>
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
<{if ($arCategory.module=="catalog" or $arCategory.module=="search") and !empty($items)}>
        <{include file="core/filter-popup.tpl"}>
<{/if}>
        <{include file='core/mobile-menu.tpl'}>
        <{include file='core/basket.tpl'}>
        <{include file='core/basket-modal.tpl'}>
        <{include file='core/modal.tpl'}>
        <{include file='core/footer-extra.tpl'}>
    </body>
</html>