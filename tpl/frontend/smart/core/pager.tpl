<{* REQUIRE VARS: arrPager=array(), page=int, showTitle=[0|1], showFirstLast=[0|1], showPrevNext=[0|1], showAll=[0|1] *}>
<{* arrPager = array_keys(all, first, last, prev, next, count, pages, baseurl, sep) *}>
<div class="pagination">
    <ul>
<{foreach name=i from=$arrPager->getPages() item=iItem}>
        <li class="<{if $page==$iItem}>cur<{/if}>">
<{if $page!=$iItem AND $arrPager->getSeparator()!=$iItem}>
            <a href="<{$arrPager->getUrl($iItem)}>">
<{/if}>
            <{$iItem}>
<{if $page!=$iItem AND $arrPager->getSeparator()!=$iItem}>
            </a>
<{/if}>
        </li>
<{/foreach}>
    </ul>
</div>