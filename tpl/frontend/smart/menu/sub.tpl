<{section name=i loop=$subMenu}>
    <a class="menu submenu<{if $subMenu[i].id==$arrPageData.catid}> active<{/if}>" href="<{include file='core/href.tpl' arCategory=$subMenu[i]}>" title="<{$subMenu[i].title}>"><{$subMenu[i].title}></a>
<{/section}>

