<div class="filters">
<{foreach name=i from=$arrPageData.filters key=filterID item=filter}>
<{if !empty($filter.children)}>
    <div class="section <{if $filter.type=='price'}>price-filter<{/if}>" id="filter_<{$filterID}>">
        <h4><{$filter.title}></h4>
<{*fixed price filter type*}>
<{if $filter.type=='price'}>
        <div class="price-slider">
            <div id="slider_range" data-url="<{$filter.children.url}>" data-masks="<{$filter.children.masks|escape}>" data-selected="<{if $filter.children.selected.min OR $filter.children.selected.max}>1<{else}>0<{/if}>"></div>
        </div>
        <p><span id="slider_min">0</span> - <span id="slider_max">450</span> грн</p>
        <script type="text/javascript">
            window.addEventListener("DOMContentLoaded", initPriceSlider, false);
            function initPriceSlider (timeout) {
                timeout = timeout||100;
                if (typeof jQuery != "undefined" && typeof noUiSlider != "undefined") {
                    // Price range slider
                    var slider_range = document.getElementById("slider_range"),
                        slider_min   = document.getElementById("slider_min"),
                        slider_max   = document.getElementById("slider_max");
                    noUiSlider.create(slider_range, {
                        start: [
                            <{if $filter.children.selected.min}><{$filter.children.selected.min|round}><{else}><{$filter.children.min|round}><{/if}>,
                            <{if $filter.children.selected.max}><{$filter.children.selected.max|round}><{else}><{$filter.children.max|round}><{/if}>
                        ],
                        connect: true,
                        range: {
                            min: parseInt(<{$filter.children.min|round}>),
                            max: parseInt(<{$filter.children.max|round}>)
                        }
                    });
                    slider_range.noUiSlider.on("update", function (values, handle) {
                        var value = values[handle];
                        if (handle) {
                            slider_max.innerText = Math.ceil(value);
                        } else {
                            slider_min.innerText = Math.floor(value);
                        }
                    });
                    slider_range.noUiSlider.on("change", function () {
                        window.location.href = createPriceUrl($(slider_range));
                    });
                } else setTimeout("initPriceSlider", timeout);
            }
            function createPriceUrl(obj) {
                var slider_min = document.getElementById("slider_min"),
                    slider_max = document.getElementById("slider_max"),
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