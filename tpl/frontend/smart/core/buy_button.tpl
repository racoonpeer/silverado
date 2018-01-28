<{if !isset($list)}>
<{assign var=list value=true}>
<{/if}>
<div class="buttons">
<{if !$list}>
        <{include file="core/product_price.tpl"}>
        <div class="btn-wrap">
<{/if}>
        <button class="btn btn-<{if !$list}>m btn-danger<{else}>s btn-link<{/if}> add-to-cart<{if $Basket->isSetKey($item.idKey)}> in-cart<{/if}>" 
            data-key="<{$item.idKey}>" 
            data-url="<{include file='core/href_item.tpl' arCategory=$item.arCategory arItem=$item}>" 
            onclick="<{if $list}>Basket.openDialog($(this).data('url'));<{else}><{if $Basket->isSetKey($item.idKey)}>Basket.open();<{else}>Basket.add('<{$item.idKey}>', 1, 0);<{/if}><{/if}>"
            data-text="<{$smarty.const.BUY}>" data-alt="<{$smarty.const.IN_CART}>">
        </button>
<{if !$list}>
        <a href="#" onclick="return Modal.open('<{include file="core/href.tpl" arCategory=$arrModules.quickcheckout params="itemID="|cat:$item.id}>');" class="buy-quick"> упить в 1 клик</a>
    </div>
<{/if}>
</div>