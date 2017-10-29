<div class="control-filter" id="control_filter">
    <button class="trigger" onclick="MobileFilters.toggle('<{$UrlWL->copy()->resetPage()->resetFilters()->buildUrl()}>');">
<{if !empty($arrPageData.selectedFilters)}>
        <span class="cnt"><{$arrPageData.selectedFilters|count}></span>
<{/if}>
    </button>
</div>