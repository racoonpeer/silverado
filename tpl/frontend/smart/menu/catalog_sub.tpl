<{* REQUIRE VARS: $arItems=array()}> <{include file='menu/catalog_sub.tpl' arItems=$HTMLHelper->getFilterMenuLevel($arItems[i]) *}>
<{if !empty($arItems)}>
<ul>
<{section name=i loop=$arItems}>
<{if $arItems[i].separate and !empty($arItems[i].subcategories)}>
    <li class="separator"><{$arItems[i].title}></li>
<{section name=j loop=$arItems[i].subcategories}>
    <li>
        <a href="<{include file='core/href.tpl' arCategory=$arItems[i].subcategories[j]}>"><{$arItems[i].subcategories[j].title}></a>
    </li>
<{/section}>
<{if !$smarty.section.i.last}>
</ul>
<ul>
<{/if}>
<{else}>
    <li>
        <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>"><{$arItems[i].title}></a>
    </li>
<{/if}>
<{/section}>
</ul>
<{/if}>