<div id="slider-wrapper">
    <div id="slider" class="homeslider"> 
<{foreach from=$HTMLHelper->getSliderItems() item=arItem name=i}>
        <a href="<{$arItem.url}>" title="<{$arItem.title}>"><img src="<{$arItem.path}><{$arItem.image}>" alt="<{$arItem.title}>" title="#sliderCaption<{$smarty.foreach.i.iteration}>" /></a> 
<{/foreach}>
    </div>
<{foreach from=$HTMLHelper->getSliderItems() item=arItem name=i}>
    <div id="sliderCaption<{$smarty.foreach.i.iteration}>" class="slider-html-caption"><{$arItem.descr}> </div>
<{/foreach}>
    <script type="text/javascript">
        jQuery('#slider').slides({
            preload: true,
            generateNextPrev: true
        });
    </script>
</div>