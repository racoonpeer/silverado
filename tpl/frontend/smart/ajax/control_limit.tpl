<{if !empty($arrPageData.arSorting)}>
<div class="pull-right limit">
    <span>товаров на странице:</span>
<{foreach name=i from=$arrPageData.arLimit key=limitID item=limit}>
    <button onclick="window.location.assign('<{$limit.url}>');"<{if $limit.active}> disabled<{/if}>><{$limitID}></button>
<{/foreach}>
    <label for="control_limit">
        <{$arrPageData.limit}>
        <select id="control_limit" onchange="window.location.assign(this.value);">
    <{foreach name=i from=$arrPageData.arLimit key=limitID item=limit}>
            <option value="<{$limit.url}>" <{if $limitID==$arrPageData.limit}>selected<{/if}>><{$limitID}></option>
    <{/foreach}>
        </select>
    </label>
</div>
<{/if}>