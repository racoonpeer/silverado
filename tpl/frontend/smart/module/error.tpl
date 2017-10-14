<div class="page-container container clearfix">
    <div class="error-page">
        <div class="code">4<span>0</span>4</div>
        <h1>Страница не найдена</h1>
        <p>Возможно она удалена или была допущена ошибка в адресе.<br/>
            Воспользуйтесь поиском или вернитесь<br/>
            на <a href="/">главную страницу</a></p>
    </div>
<{assign var=viewed value=$HTMLHelper->getLastWatched($UrlWL)}>
<{if !empty($viewed)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$viewed title="Товары которые вы недавно смотрели"}>
<{/if}>
</div>