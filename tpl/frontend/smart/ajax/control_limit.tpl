<{if !empty($arrPageData.arSorting)}>
<div class="pull-right limit" id="control_limit">
    <span>товаров на странице:</span>
<{foreach name=i from=$arrPageData.arLimit key=limitID item=limit}>
    <button onclick="AjaxUpdatePage('<{$limit.url}>');"<{if $limit.active}> disabled<{/if}>><{$limitID}></button>
<{/foreach}>
    <label for="control_limit">
        <{$arrPageData.limit}>
        <select id="control_limit" onchange="AjaxUpdatePage(this.value);">
<{foreach name=i from=$arrPageData.arLimit key=limitID item=limit}>
            <option value="<{$limit.url}>" <{if $limitID==$arrPageData.limit}>selected<{/if}>><{$limitID}></option>
<{/foreach}>
        </select>
    </label>
</div>
<{/if}>