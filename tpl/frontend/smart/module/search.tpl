<div class="page-container container clearfix">
    <{include file='core/breadcrumb.tpl' arrBreadCrumb=$arrPageData.arrBreadCrumb}>
    <h1 class="heading-title"><{$arCategory.title}></h1>
    <div class="controlbar clearfix">
        <{include file="ajax/control_limit.tpl"}>
        <{include file="ajax/control_sort.tpl"}>
        <div class="selected-filters" id="selectedFilters">
            <{include file='ajax/selected_filters.tpl'}>
        </div>
    </div>
    <div class="pull-left column-left" id="filtersForm">
        <{include file='ajax/filter.tpl'}>
    </div>
    <div class="pull-right product-grid clearfix" id="products">
        <{include file='ajax/products.tpl' items=$items}>
    </div>
</div>