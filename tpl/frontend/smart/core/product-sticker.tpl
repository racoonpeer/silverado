<{if $item.is_new OR $item.is_top OR $item.is_stock}>
<span class="badge <{if $item.is_new}>sale<{elseif $item.is_top}>hit<{elseif $item.is_stock}>sale<{/if}>"></span>
<{/if}>