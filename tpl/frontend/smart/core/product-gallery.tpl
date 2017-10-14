<div class="product-image flypage-gallery">
    <div class="screen">
<{foreach name=i from=$item.images item=image}>
        <div class="slick-slide <{if $smarty.foreach.i.first}>slick-active<{/if}>" data-original="<{$image.image}>">
            <img src="<{$image.big_image}>" alt=""/>
        </div>
<{/foreach}>
    </div>
<{if $item.images|count > 1}>
    <ul class="thumbs">
<{foreach name=i from=$item.images item=image}>
        <li class="<{if $smarty.foreach.i.first}>selected<{/if}>">
            <a href="#" data-index="<{$smarty.foreach.i.index}>">
                <img src="<{$image.small_image}>" alt="<{$item.title}>"/>
            </a>
        </li>
<{/foreach}>
    </ul>
<{/if}>
</div>