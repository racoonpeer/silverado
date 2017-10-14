<{* include file="ajax/_filter.tpl" fid=$filterID aid=$arKey $value='id' item=$arItem*}>
<li class="<{if $item.hidden}>hidable hidden<{/if}> <{if $template=="image"}>inline<{/if}>">
    <input type="checkbox" 
           id="filter_<{$filter.id}>_<{$item.id}>" 
           data-url="<{$item.url}>" 
           onchange="window.location.href=$(this).data('url');" 
           <{if $item.selected}>checked<{elseif $item.cnt==0}>disabled<{/if}>/>

    <label class="<{if $template=="image"}>colorbox<{else}>checkbox<{/if}> <{if $item.selected}>checked<{elseif $item.cnt==0}>disabled<{/if}>" for="filter_<{$filter.id}>_<{$item.id}>">
<{if $template=="image"}>
        <img src="<{$item.image}>" alt="<{$item.title}>" title="<{$item.title}>"/>
<{else}>
        <{$item.title}><{if $item.cnt > 0}> <span class="cnt">(<{if !$item.selected AND $item.cnt_diff > 0}>+<{$item.cnt_diff}><{else}><{$item.cnt}><{/if}>)</span><{/if}>
<{/if}>
    </label>
</li>