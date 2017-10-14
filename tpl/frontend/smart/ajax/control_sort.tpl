<{if !empty($arrPageData.arSorting)}>
<div class="pull-left sort">
    сортировка:
    <select onchange="window.location.assign(this.value);">
<{foreach name=i from=$arrPageData.arSorting key=sortID item=sorting}>
        <option value="<{$sorting.url}>"<{if $sorting.active}> selected<{/if}>><{$sorting.title}></option>
<{/foreach}>
    </select>
</div>
<{/if}>