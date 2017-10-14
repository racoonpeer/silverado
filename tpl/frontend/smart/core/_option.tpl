<{*WIEW ON PRODUCT FLYPAGE*}>
<{if in_array($option.typename, $types) AND !empty($option.values)}>
<div class="option-label" data-label="<{$option.title}>:">
<{foreach name=i from=$option.values key=valueID item=value}>
<{if $value.selected > 0}><{$value.title}><{/if}>
<{/foreach}>
</div>
<div class="<{if $option.typename=="image"}>im<{else}>opt<{/if}>group clearfix">
<{foreach name=i from=$option.values key=valueID item=value}>
    <input type="radio" id="options_<{$item.id}>_<{$option.id}>_<{$valueID}>" name="options[<{$item.id}>][<{$option.id}>]" value="<{$valueID}>" data-label="<{$value.title}>" data-optionid="<{$option.id}>" data-valueid="<{$valueID}>" onchange="return Basket.changeOptions(<{$item.id}>, $(this).closest('.product-flypage'), <{$list|intval}>);" <{if $value.selected}>checked<{/if}>/>
    <label for="options_<{$item.id}>_<{$option.id}>_<{$valueID}>"<{if $option.typename=="image"}> style="background-image: url('<{$value.image}>');"<{/if}>><{$value.title}></label>
<{/foreach}>
</div>
<{/if}>