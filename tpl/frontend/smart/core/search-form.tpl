<{*include file='core/search-form.tpl'*}>
<button class="search-toggle"></button>
<div class="searchbar">
    <form action="<{include file='core/href.tpl' arCategory=$arrModules.search}>" method="GET" id="searchForm" name="qSearchForm" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
        <meta itemprop="target" content="<{$smarty.const.WLCMS_HTTP_HOST}><{include file='core/href.tpl' arCategory=$arrModules.search}>?q={q}"/>
        <input itemprop="query-input" type="search" name="q" id="qSearchText" value="<{if !empty($arrPageData.stext)}><{$arrPageData.stext}><{/if}>"/>
        <button type="submit"></button>
    </form>
</div>