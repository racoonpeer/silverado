<div class="top_logout">
    <a href="<{$smarty.const.WLCMS_HTTP_PREFIX|cat:$smarty.server.HTTP_HOST|cat:"/"}>" target="_blank"><{$smarty.const.TOPLINK_PREVIEW_SITE}></a>
    <a href="/admin/?action=logout&last_url=<{$smarty.server.REQUEST_URI|urlencode}>"><{$smarty.const.TOPLINK_LOGOUT}></a>
</div>
