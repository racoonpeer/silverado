<p class="nav">
<{section name=i loop=$arItems}>
    <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>"><{$arItems[i].title}></a>
<{/section}>
</p>