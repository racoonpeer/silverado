<div class="minicart" id="minicart">
    <button class="trigger<{if $Basket->getTotalAmount()>0}> active<{/if}>" onclick="Basket.open();" data-count="<{$Basket->getTotalAmount()}>" <{if $Basket->getTotalAmount()==0}>disabled<{/if}>></button>
    <span>
<{if $Basket->getTotalAmount()==0}>
        в корзине<br/>
        пока нет товаров
<{else}>
        в корзине <{$Basket->getTotalAmount()}> <{$HTMLHelper->getNumEnding($Basket->getTotalAmount(), array("товар", "товара", "товаров"))}> <br/>
        на сумму <{$Basket->getTotalPrice()|number_format:0:'.':' '}> грн.
<{/if}>
    </span>
</div>