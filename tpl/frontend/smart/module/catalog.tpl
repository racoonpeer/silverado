<div class="page-container container clearfix">
    <{include file='core/breadcrumb.tpl' arrBreadCrumb=$arrPageData.arrBreadCrumb}>
<{* DISPLAY ITEM FIRST IF NOT EMPTY *}>
<{if !empty($item)}>
    <div class="product-card clearfix">
        <div class="product-details">
<{if $item.comments_count>0}>
            <div class="reviews">
                <div class="rating v-<{$item.rating}>"></div>
                <a href="#reviews"><{$item.comments_count}> <{$HTMLHelper->getNumEnding($item.comments_count, array("отзыв", "отзыва", "отзывов"))}></a>
            </div>
<{/if}>
<{if !empty($item.attrGroups)}>
            <ul class="attributes">
                <li><strong>Код товара:</strong> <{$item.pcode}></li>
<{section name=i loop=$item.attrGroups}>
<{if !empty($item.attrGroups[i].attributes)}>
<{foreach name=j from=$item.attrGroups[i].attributes item=arItem}>
                <li><strong><{$arItem.title}>:</strong> <{$arItem.values|@implode:', '}></li>
<{/foreach}>
<{/if}>
<{/section}>
            </ul>
<{/if}>
            <div class="share">
                <a href="#" class="fb" onclick="Share.facebook(location.href, document.title, 'http://<{$smarty.server.HTTP_HOST|cat:$item.image.big_image}>');"></a>
                <a href="#" class="gp" onclick="Share.vkontakte(location.href, document.title, 'http://<{$smarty.server.HTTP_HOST|cat:$item.image.big_image}>');"></a>
                <a href="#" class="tw" onclick="Share.twitter(location.href, document.title);"></a>
            </div>
        </div>
        <{include file="core/product-gallery.tpl"}>
        <div class="product-flypage details clearfix">
            <{include file="core/product-sticker.tpl"}>
            <h1 class="product-title"><{$item.title}> <{$item.pcode}></h1>
            <div class="product-descr"><{$item.descr}></div>
            <{include file="core/buy_button.tpl" list=false}>
<{foreach from=$item.options key=optionID item=option}>
            <div class="options">
                <form>
                    <{include file="core/_option.tpl" list=false types=array("select","radio", "image")}>
                </form>
            </div>
<{/foreach}>
        </div>
    </div>
<{if !empty($item.kits)}>
    <div class="clearfix"></div>
    <{include file="core/product-kit.tpl" arItems=$item.kits}>
<{elseif !empty($item.elements)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$item.elements title="Товары в комплекте"}>
<{/if}>
<{if !empty($item.related)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$item.related title="Похожие модели"}>
<{/if}>
    <div class="clearfix">
        <div class="product-reviews" id="reviews">
            <div class="h1">Отзывы о товаре <em><{$item.title}><{if !empty($item.pcode)}> <{$item.pcode}><{/if}></em></div>
            <{include file='ajax/comment-form.tpl' item=$item formData=array() errors=array() result=false ajax=false}>
            <button class="form-toggle btn btn-danger btn-l" onclick="Comments.toggleForm();">Оставить отзыв</button>
            <div class="list" id="commentList"></div>
            <script type="text/javascript">
                function initLoadComments (timeout) {
                    if (typeof jQuery != "undefined" && typeof Comments != "undefined")  {
                        Comments.construct();
                        Comments.load("<{include file="core/href_item.tpl" arCategory=$item.arCategory arItem=$item params="action=loadComments"}>");
                    } else setTimeout(function(){
                        initLoadComments (timeout);
                    }, timeout);
                }
                initLoadComments(100);
            </script>
        </div>
    </div>
<{* DISPLAY ITEMS LIST IF NOT EMPTY *}>
<{elseif !empty($items)}>
    <h1 class="heading-title"><{$arCategory.title}></h1>
    <div class="controlbar clearfix">
        <{include file="ajax/control_filter.tpl"}>
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
<{* DISPLAY CATEGORY INFO *}>
<{else}>
    <{include file='core/static.tpl'}>
<{/if}>
</div>