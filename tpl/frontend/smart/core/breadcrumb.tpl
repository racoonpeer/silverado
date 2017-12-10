<{* REQUIRE VARS: $arrBreadCrumb=array()*}><{*include file='core/breadcrumb.tpl' arrBreadCrumb=$arrPageData.arrBreadCrumb*}>
<{if $arrBreadCrumb|count > 1}>
<div class="breadcrumbs">
    <ul itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="/">
                <a itemprop="item" href="/">Silverado</a>
                <meta itemprop="position" content="1"/>
            </a>
        </li>
<{foreach name=i from=$arrBreadCrumb key=sKey item=sItem}>
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
<{if !$smarty.foreach.i.last}>
            <a href="<{$sKey}>">
<{/if}>
                <span itemprop="name"><{$sItem}></span>
                <meta itemprop="position" content="<{$smarty.foreach.i.iteration+1}>"/>
<{if !$smarty.foreach.i.last}>
            </a>
<{/if}>
        </li>
<{/foreach}>
    </ul>
</div>
<{/if}>