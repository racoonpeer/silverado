<{section name=i loop=$comments}>
<div class="item">
    <p>
<{if !empty($comments[i].rating)}>
        <div class="rating v-<{$comments[i].rating}>"></div>
<{/if}>
        <{$comments[i].descr|unScreenData}>
    </p>
    <strong><{$comments[i].title}></strong>, <span><{if !empty($comments[i].createdDate)}><{$comments[i].createdDate}><{else}><{$HTMLHelper->RuDateFormat($comments[i].created)}><{/if}></span>
<{*if !$marginLevel}>
    <a href="#" onclick="Comments.reply(<{$comments[i].id}>, '<{$comments[i].title}>');">ответить</a>
<{/if}>
<{if !empty($comments[i].children)}>
    <{include file="core/product-comments.tpl" comments=$comments[i].children marginLevel=$marginLevel+2}>
<{/if*}>
</div>
<{/section}>
<{if $pager.pages > 1}>
<div class="pagination">
    <ul>
<{section name=i loop=$pager.pages}>
        <li class="<{if $smarty.section.i.iteration==$pager.page}>cur<{/if}>">
<{if $smarty.section.i.iteration!=$pager.page}>
            <a href="<{$pager.url|cat:"&npage="|cat:$smarty.section.i.iteration}>" onclick="return Comments.load(this.href);" class="pag-hover">
<{/if}>
            <{$smarty.section.i.iteration}>
<{if $smarty.section.i.iteration!=$pager.page}>
            </a>
<{/if}>
        </li>
<{/section}>
    </ul>
</div>
<{/if}>