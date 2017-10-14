<!DOCTYPE html>
<html lang="<{$lang}>">
    <{include file="core/head.tpl"}>
    <body>
        <div id="sbIndex" canvas="container">
            <{include file='core/header-basket.tpl'}>
            <{include file='module/'|cat:$arCategory.module|cat:'.tpl'}>
            <{include file='core/footer-basket.tpl'}>
        </div>
        <{include file='core/basket.tpl'}>
        <{include file='core/basket-modal.tpl'}>
        <{include file='core/modal.tpl'}>
        <{include file='core/footer-extra.tpl'}>
    </body>
</html>