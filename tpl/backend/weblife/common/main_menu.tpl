<{if !empty($arrPageData.main_menu)}>
    <ul>
<{section name=i loop=$arrPageData.main_menu}>
        <li class="menu_item<{if $arrPageData.module==$arrPageData.main_menu[i].module || ($arrPageData.main_menu[i].module=='attribute_groups' && $arrPageData.module=='attributes' )}> active<{/if}>">
            <a href="/admin/?module=<{$arrPageData.main_menu[i].module}>"><{$arrPageData.main_menu[i].title}></a>
<{if $arrPageData.main_menu[i].module=="orders" and $arrPageData.new_orders>0}>
            <span class="cnt"><{$arrPageData.new_orders}></span>
<{elseif $arrPageData.main_menu[i].module=="comments" and $arrPageData.new_comments>0}>
            <span class="cnt"><{$arrPageData.new_comments}></span>
<{/if}>
        </li>
<{if $smarty.section.i.iteration%8==0}>
    </ul>
    <ul>
<{/if}>
<{/section}>
    </ul>   
<{/if}>
