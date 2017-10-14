<{if !empty($arrPageData.selectedFilters)}>
<{foreach name=i from=$arrPageData.filters key=filterID item=filter}>
<{if array_key_exists($filterID, $arrPageData.selectedFilters) AND !empty($filter.children)}>
<{* brand or category filter type *}>
<{if $filter.type=='brand' OR $filter.type=='category'}>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
<{if $arItem.selected}>
<a href="<{$arItem.url}>"><{$arItem.title}></a>
<{/if}>
<{/foreach}>
<{* fixed price filter type *}>
<{elseif $filter.type=='price'}>
<{if $filter.children.selected.min && $filter.children.selected.max}>
<a href="<{$filter.children.selected.url}>">от <{$filter.children.selected.min}> до <{$filter.children.selected.max}> грн</a>
<{/if}>
<{*range filter type*}>
<{elseif $filter.type=='range'}>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
<{if $arItem.selected}>
<a href="<{$arItem.url}>"><{$arItem.title}></a>
<{/if}>
<{/foreach}>
<{*simple attribute filter type*}>
<{else}>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
<{if $arItem.selected}>
<a href="<{$arItem.url}>"><{$arItem.title}></a>
<{/if}>
<{/foreach}>
<{/if}>
<{/if}>
<{/foreach}>
<a class="clear-all" href="<{$UrlWL->copy()->resetPage()->resetFilters()->buildUrl()}>"><{$smarty.const.REMOVE_ALL_FILTERS}></a>
<{/if}>