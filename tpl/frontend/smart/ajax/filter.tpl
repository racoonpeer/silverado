<{if !isset($mobile)}><{assign var="mobile" value=false}><{/if}>
<{if $mobile}>
<{assign var="prefix" value="mobile_"}>
<{else}>
<{assign var="prefix" value=""}>
<{/if}>
<div class="filters">
<{foreach name=i from=$arrPageData.filters key=filterID item=filter}>
<{if !empty($filter.children)}>
    <div class="section <{if $filter.type=='price'}>price-filter<{/if}>" id="<{$prefix}>filter_<{$filterID}>">
        <div class="h4" onclick=""><{$filter.title}></div>
<{*fixed price filter type*}>
<{if $filter.type=='price'}>
        <div class="price-slider">
            <div id="<{$prefix}>slider_range" data-url="<{$filter.children.url}>" data-masks="<{$filter.children.masks|escape}>" data-selected="<{if $filter.children.selected.min OR $filter.children.selected.max}>1<{else}>0<{/if}>"></div>
        </div>
        <p>
            <span id="<{$prefix}>slider_min"><{if $filter.children.selected.min}><{$filter.children.selected.min|round}><{else}><{$filter.children.min|round}><{/if}></span> - 
            <span id="<{$prefix}>slider_max"><{if $filter.children.selected.max}><{$filter.children.selected.max|round}><{else}><{$filter.children.max|round}><{/if}></span> грн
        </p>
        <script type="text/javascript">
            <{$prefix}>initPriceSlider(100);
            function <{$prefix}>initPriceSlider (timeout) {
                timeout = timeout||100;
                if (typeof jQuery != "undefined" && typeof noUiSlider != "undefined") {
                    // Price range slider
                    var slider_range = document.getElementById("<{$prefix}>slider_range"),
                        slider_min   = document.getElementById("<{$prefix}>slider_min"),
                        slider_max   = document.getElementById("<{$prefix}>slider_max");
                    noUiSlider.create(slider_range, {
                        start: [
                            <{if $filter.children.selected.min}><{$filter.children.selected.min|round}><{else}><{$filter.children.min|round}><{/if}>,
                            <{if $filter.children.selected.max}><{$filter.children.selected.max|round}><{else}><{$filter.children.max|round}><{/if}>
                        ],
                        range: {
                            min: parseInt(<{$filter.children.min|round}>),
                            max: parseInt(<{$filter.children.max|round}>)
                        },
                        connect: true
                    });
                    slider_range.noUiSlider.on("update", function (values, handle) {
                        var value = values[handle];
                        if (handle) slider_max.innerText = Math.ceil(value);
                        else slider_min.innerText = Math.floor(value);
                    });
                    slider_range.noUiSlider.on("change", function () {
                        forceUpdatePage(<{$prefix}>createPriceUrl($(slider_range)));
                    });
                } else setTimeout("<{$prefix}>initPriceSlider", timeout);
            }
            function <{$prefix}>createPriceUrl(obj) {
                var slider_min = document.getElementById("<{$prefix}>slider_min"),
                    slider_max = document.getElementById("<{$prefix}>slider_max"),
                    masks      = obj.data('masks'),
                    url        = decodeURIComponent(obj.data('url')),
                    min        = parseInt(slider_min.innerHTML),
                    max        = parseInt(slider_max.innerHTML);
                url = url.replace(masks['<{UrlFiltersRange::KEY_MIN}>'], min);
                if ((max*1) == 0) url = url.replace(masks['<{UrlFiltersRange::KEY_SEP_MAX}>'], '');
                url = url.replace(masks['<{UrlFiltersRange::KEY_MAX}>'], max);
                return url;
            }
        </script>
<{*brand filter type*}>
<{elseif $filter.type=='brand' OR $filter.type=='category'}>
        <ul>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
            <{include file="ajax/_filter.tpl" fid=$filterID aid=$arKey value='id' title='title' item=$arItem template=$filter.template}>
<{/foreach}>
        </ul>
<{*range filter type*}>
<{elseif $filter.type=='range'}>   
        <ul>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
            <{include file="ajax/_filter.tpl" fid=$filterID aid=$arKey value='alias' title='title' item=$arItem template=$filter.template}> 
<{/foreach}>
        </ul>
<{*simple attribute filter type*}>
<{else}>
        <ul>
<{foreach name=j from=$filter.children key=arKey item=arItem}>
            <{include file="ajax/_filter.tpl" fid=$filterID aid=$arKey value='alias' title='title' item=$arItem template=$filter.template}>
<{/foreach}>
        </ul>
<{/if}>
    </div>
<{/if}> 
<{/foreach}>
</div>