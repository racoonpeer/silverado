<{*include file='core/search-form.tpl'*}>
<button class="search-toggle"></button>
<div class="searchbar">
    <form action="<{include file='core/href.tpl' arCategory=$arrModules.search}>" method="GET" id="searchForm" name="qSearchForm">
        <input type="search" name="stext" id="qSearchText" value="<{if !empty($arrPageData.stext)}><{$arrPageData.stext}><{/if}>"/>
        <button type="submit"></button>
    </form>
</div>