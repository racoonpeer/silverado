<{*include file='core/header.tpl'*}>
<div class="header-container">
    <div class="section-middle container clearfix">
        <div class="lt">
            <div class="logo">
<{if $arCategory.module!="home"}>
                <a href="/"></a>
<{/if}>
            </div>
        </div>
        <div class="phones">
            <a href="tel:+380990549540">099 0549540</a>&emsp;
            <a href="tel:+380960549540">096 0549540</a>&emsp;
            <a href="tel:+380930549540">093 0549540</a>
<{if isset($arrModules.callback)}>
            <div class="hint">заказать <a href="#" onclick="return Modal.open('<{include file="core/href.tpl" arCategory=$arrModules.callback}>');">обратный звонок</a></div>
<{/if}>
        </div>
    </div>
</div>