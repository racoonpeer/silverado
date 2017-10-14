<{if !empty($options)}>
<div class="options">
    <form>
<{foreach from=$options key=optionID item=option}>
        <{include file="core/_option.tpl" list=$list types=$types}>
<{/foreach}>
    </form>
</div>
<{/if}>