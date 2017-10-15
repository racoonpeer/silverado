<div class="mobile-menu" off-canvas="mobile-menu left shift" id="mobileMenu">
    <a class="m-logo <{if $arCategory.module=="home"}>noclick<{/if}>" href="<{if $arCategory.module=="home"}>#<{else}>/<{/if}>"></a>
    <div class="menu-wrap">
        <{include file="menu/catalog.tpl" arItems=$catalogMenu marginLevel=0}>
    </div>
</div>