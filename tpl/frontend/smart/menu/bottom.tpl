<{*include file='menu/bottom.tpl'*}>
<{if !isset($break)}><{assign var=break value=5}><{/if}>
<{if !empty($arItems)}>
<ul>
<{section name=i loop=$arItems}>
    <li>
        <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>"><{$arItems[i].title}></a>
    </li>
<{if !$smarty.section.i.last AND $smarty.section.i.iteration%$break==0}>
</ul>
<ul>
<{/if}>
<{/section}>
</ul>
<{/if}>