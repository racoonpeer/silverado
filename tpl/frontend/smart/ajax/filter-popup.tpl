<{include file="ajax/filter.tpl" mobile=true}>
<div class="buttons clearfix">
    <button class="pull-left btn btn-m btn-link" onclick="forceUpdatePage('<{$UrlWL->copy()->resetPage()->resetFilters()->buildUrl()}>');">Сбросить</button>
    <button class="pull-right btn btn-m btn-danger" onclick="MobileFilters.apply();">Применить</button>
</div>