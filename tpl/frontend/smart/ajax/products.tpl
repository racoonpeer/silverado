<{if !empty($items)}>
<{section name=i loop=$items}>
    <{include file='core/product.tpl' item=$items[i]}>
<{/section}>
<{if $arrPageData.total_pages>1}>
    <{include file='core/pager.tpl' arrPager=$arrPageData.pager page=$arrPageData.page showTitle=0 showFirstLast=1 showPrevNext=0 showAll=0}>
<{/if}>
<{else}>
<{$smarty.const.NO_PRODUCTS}>
<{/if}>