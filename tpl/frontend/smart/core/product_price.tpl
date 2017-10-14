<div class="price<{if $item.old_price AND $item.old_price>$item.price}> stock<{/if}>">
<{if $item.old_price AND $item.old_price > $item.price}>
    <span class="strike">
        <strong><{$item.old_price|number_format:0:'.':' '}></strong>
    </span>
<{/if}>
    <strong><{$item.price|number_format:0:'.':' '}></strong>
</div>