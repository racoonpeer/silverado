<{if !empty($arrPageData.arSorting)}>
<div class="pull-left sort">
    <label>
        <span>сортировка:</span>
        <select onchange="window.location.assign(this.value);">
<{foreach name=i from=$arrPageData.arSorting key=sortID item=sorting}>
            <option value="<{$sorting.url}>"<{if $sorting.active}> selected<{/if}>><{$sorting.title}></option>
<{/foreach}>
        </select>
    </label>
</div>
<{/if}>