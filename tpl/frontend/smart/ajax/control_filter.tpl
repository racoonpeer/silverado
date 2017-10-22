<div class="control-filter" id="control_filter">
    <button class="trigger" onclick="return true;">
        <span class="cnt">6</span>
<{if !empty($arrPageData.selectedFilters)}>
        <span class="cnt"><{$arrPageData.selectedFilters|count}></span>
<{/if}>
    </button>
</div>