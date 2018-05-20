<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<{$arrLangs.$lang.charset}>"/>
    <title><{$HTMLHelper->prepareHeadTitle($arCategory)|unScreenData}></title>
    <meta name="description" content="<{$arCategory.meta_descr|unScreenData}>"/>
    <meta name="keywords" content="<{$arCategory.meta_key}>"/>
<{if !empty($arCategory.meta_robots)}>
    <meta name="robots" content="<{$arCategory.meta_robots}>" id="meta_robots"/>
<{/if}>
<{if $arCategory.module=="catalog" AND !empty($item)}>
    <meta property="og:type" content="product"/>
    <meta property="og:image" content="<{$smarty.const.WLCMS_HTTP_PREFIX|cat:$smarty.server.HTTP_HOST|cat:$item.image.big_image}>">
<{/if}>
    <meta property="og:site_name" content="<{$objSettingsInfo->websiteName}>"/>
    <meta property="og:url" content="<{$smarty.const.WLCMS_HTTP_PREFIX|cat:$smarty.server.HTTP_HOST|cat:$UrlWL->getUrl()}>"/>
    <meta property="og:title" content="<{$HTMLHelper->prepareHeadTitle($arCategory)}>"/>
    <meta property="og:description" content="<{$arCategory.meta_descr|unScreenData}>">
<{if $objSettingsInfo->logo}>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
    <link rel="manifest" href="/images/icons/manifest.json">
    <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
<{/if}>
<{section name=i loop=$arrPageData.headCss}>
    <link href="<{$arrPageData.headCss[i]}>" type="text/css" rel="stylesheet"/>
<{/section}>
<{section name=i loop=$arrPageData.headScripts}>
    <script type="text/javascript" src="<{$arrPageData.headScripts[i]}>"></script>
<{/section}>
    <{include file='core/header-extra.tpl'}>
</head>