<{if !isset($marginLevel)}><{assign var=marginLevel value=0}><{/if}>
<ul class="main-menu">
<{section name=i loop=$arItems}>
    <li class="<{if !empty($arItems[i].subcategories)}>sublevels<{/if}>">
        <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>" class="<{if $arItems[i].is_stock}>bold stock<{/if}> <{if $arItems[i].opened}>current<{/if}>"><{$arItems[i].title}></a>
<{if !empty($arItems[i].subcategories)}>
        <div class="dropdown">
            <div class="container">
                <ul>
                    <li>
                        <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>" class="bold">Все <span class="lowercase"><{$arItems[i].title}></span></a>
                    </li>
                </ul>
                <{include file="menu/catalog-sub.tpl" arItems=$arItems[i].subcategories break=5}>
            </div>
        </div>
<{/if}>
    </li>
<{/section}>
</ul>