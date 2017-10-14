<!DOCTYPE html>
<html lang="<{$lang}>">
    <{include file="core/head.tpl"}>
    <body>
        <h1><{$arCategory.title}></h1>
<{foreach from=$arrPageData.messages item=message}>
        <p><{$message}></p>
<{/foreach}>
    </body>
</html>