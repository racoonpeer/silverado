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
                        <a href="<{include file='core/href.tpl' arCategory=$arItems[i]}>" class="bold">��� <span class="lowercase"><{$arItems[i].title}></span></a>
                    </li>
                </ul>
                <{include file="menu/catalog_sub.tpl" arItems=$arItems[i].subcategories break=5}>
            </div>
        </div>
<{/if}>
    </li>
<{/section}>
</ul>
<{*
<ul class="main-menu">
    <li>
        <a href="#" class="">���������</a>
    </li>
    <li>
        <a href="#" class="">������</a>
        <div class="dropdown">
            <div class="container">
                <ul>
                    <li class="bold">
                        <a href="/catalog">��� ������</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">�������</a>
                    </li>
                    <li>
                        <a href="#">�������</a>
                    </li>
                    <li>
                        <a href="#">�������</a>
                    </li>
                    <li>
                        <a href="#">�������</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">� ����������� ������</a>
                    </li>
                    <li>
                        <a href="#">� ��������</a>
                    </li>
                    <li>
                        <a href="#">� ���������</a>
                    </li>
                    <li>
                        <a href="#">� ����������</a>
                    </li>
                    <li>
                        <a href="#">� ����������� NANO</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">� �����������</a>
                    </li>
                    <li>
                        <a href="#">������ � ������</a>
                    </li>
                    <li>
                        <a href="#">� ����������� Swarowski<sup>TM</sup></a>
                    </li>
                    <li>
                        <a href="#">��� �������</a>
                    </li>
                </ul>
                <ul>
                    <li class="bold">
                        <a href="#">�������</a>
                    </li>
                    <li class="bold">
                        <a href="#">����� ���</a>
                    </li>
                    <li class="bold">
                        <a href="#">����������</a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <li>
        <a href="#" class="">������</a>
    </li>
    <li>
        <a href="#" class="">��������</a>
    </li>
    <li>
        <a href="#" class="">�������</a>
    </li>
    <li>
        <a href="#" class="">������</a>
    </li>
    <li>
        <a href="#">����������</a>
    </li>
    <li>
        <a href="#" class="promo">����������</a>
    </li>
</ul>*}>