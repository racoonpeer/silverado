<{*include file='core/header.tpl'*}>
<div class="header-container" itemscope itemtype="http://schema.org/WebSite">
    <meta itemprop="name" content="SILVERADO.com.ua"/>
    <meta itemprop="url" content="<{$smarty.const.WLCMS_HTTP_HOST}>/"/>
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
                <a href="tel:+380960549540">096 054 95 40</a>
                <{*<div class="wrap">
                    <a href="tel:+380960549540">096 054 95 40</a>
                    <a href="tel:+380956227572">095 622 75 72</a>
                    <a href="tel:+380638216588">063 821 65 88</a>
                </div>*}>
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