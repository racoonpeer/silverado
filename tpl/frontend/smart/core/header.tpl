<{*include file='core/header.tpl'*}>
<div class="header-container">
    <div class="section-top">
        <div class="container clearfix">
            <{include file="menu/top.tpl" arItems=$mainMenu}>
            <div class="schedule">
                <time>с 8:00 до 20:00.</time> Без выходных
            </div>
        </div>
    </div>
    <div class="section-middle container clearfix">
<{if $arCategory.module!="checkout"}>
        <button class="btn-nav">
            <span class="constituent-1"></span>
            <span class="constituent-2"></span>
            <span class="constituent-3"></span>
        </button>
<{/if}>
        <div class="logo">
<{if $arCategory.module!="home"}>
            <a href="/"></a>
<{/if}>
        </div>
        <div class="phones">
            <div class="stack">
                <div class="wrap">
                    <a href="tel:+380990549540">099 0549540</a>
                    <a href="tel:+380960549540">096 0549540</a>
                    <a href="tel:+380930549540">093 0549540</a>
                </div>
            </div>
<{if isset($arrModules.callback)}>
            <div class="hint">заказать <a href="#" onclick="return Modal.open('<{include file="core/href.tpl" arCategory=$arrModules.callback}>');">обратный звонок</a></div>
<{/if}>
        </div>
<{if $arCategory.module=="checkout"}>
        <a href="javascript:window.history.back();" class="return">вернуться к покупкам</a>
<{else}>
        <{include file='ajax/minicart.tpl'}>
        <{include file='core/search-form.tpl'}>
<{/if}>
    </div>
    <div class="section-bottom">
        <div class="container clearfix">
            <{include file="menu/catalog.tpl" arItems=$catalogMenu marginLevel=0}>
        </div>
    </div>
</div>