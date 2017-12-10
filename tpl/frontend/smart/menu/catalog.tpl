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
        <a href="#" class="">Комплекты</a>
    </li>
    <li>
        <a href="#" class="">Кольца</a>
        <div class="dropdown">
            <div class="container">
                <ul>
                    <li class="bold">
                        <a href="/catalog">Все кольца</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">Женские</a>
                    </li>
                    <li>
                        <a href="#">Мужские</a>
                    </li>
                    <li>
                        <a href="#">Детские</a>
                    </li>
                    <li>
                        <a href="#">Унисекс</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">С натуральным камнем</a>
                    </li>
                    <li>
                        <a href="#">С жемчугом</a>
                    </li>
                    <li>
                        <a href="#">С сапфирами</a>
                    </li>
                    <li>
                        <a href="#">С изумрудами</a>
                    </li>
                    <li>
                        <a href="#">С кристаллами NANO</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">С аквамарином</a>
                    </li>
                    <li>
                        <a href="#">Кольца с агатом</a>
                    </li>
                    <li>
                        <a href="#">С кристаллами Swarowski<sup>TM</sup></a>
                    </li>
                    <li>
                        <a href="#">Без вставки</a>
                    </li>
                </ul>
                <ul>
                    <li class="bold">
                        <a href="#">Новинки</a>
                    </li>
                    <li class="bold">
                        <a href="#">Товар дня</a>
                    </li>
                    <li class="bold">
                        <a href="#">Распродажа</a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <li>
        <a href="#" class="">Серьги</a>
    </li>
    <li>
        <a href="#" class="">Браслеты</a>
    </li>
    <li>
        <a href="#" class="">Цепочки</a>
    </li>
    <li>
        <a href="#" class="">Кулоны</a>
    </li>
    <li>
        <a href="#">Аксессуары</a>
    </li>
    <li>
        <a href="#" class="promo">Распродажа</a>
    </li>
</ul>*}>