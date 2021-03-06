<div class="page-container container clearfix">
    <{include file='core/breadcrumb.tpl' arrBreadCrumb=$arrPageData.arrBreadCrumb}>
<{* DISPLAY ITEM FIRST IF NOT EMPTY *}>
<{if !empty($item)}>
    <h1 class="product-title"><{$item.title}> <{$item.pcode}></h1>
    <div class="product-card clearfix" itemscope itemtype="http://schema.org/Product">
        <meta itemprop="name" content="<{$item.title}> <{$item.pcode}>">
        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <meta itemprop="priceCurrency" content="UAH">
            <meta itemprop="price" content="<{$item.price|number_format:0:'.':''}>">
            <link itemprop="availability" href="http://schema.org/InStock"/>
        </div>
        <{include file="core/product-gallery.tpl"}>
        <div class="product-flypage details clearfix">
            <{include file="core/product-sticker.tpl"}>
            <div class="product-descr"><{$item.descr}></div>
            <{include file="core/buy_button.tpl" list=false}>
<{foreach from=$item.options key=optionID item=option}>
            <div class="options">
                <form>
                    <{include file="core/_option.tpl" list=false types=array("select","radio", "image")}>
                </form>
            </div>
<{/foreach}>
            <{include file="core/product-features.tpl"}>
        </div>
        <div class="product-details">
<{if $item.comments_count>0}>
            <div class="reviews">
                <div class="rating v-<{$item.rating}>"></div>
                <a href="#reviews"><{$item.comments_count}> <{$HTMLHelper->getNumEnding($item.comments_count, array("�����", "������", "�������"))}></a>
            </div>
<{/if}>
<{if !empty($item.attrGroups)}>
            <ul class="attributes">
                <li><strong>��� ������:</strong> <{$item.pcode}></li>
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
                <a href="#" class="vk" onclick="Share.vkontakte(location.href, document.title, 'http://<{$smarty.server.HTTP_HOST|cat:$item.image.big_image}>');"></a>
                <a href="#" class="tw" onclick="Share.twitter(location.href, document.title);"></a>
            </div>
        </div>
    </div>
<{if !empty($item.kits)}>
    <div class="clearfix"></div>
    <{include file="core/product-kit.tpl" arItems=$item.kits}>
<{elseif !empty($item.elements)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$item.elements title="������ � ���������"}>
<{/if}>
<{if !empty($item.related)}>
    <div class="hr clearfix"></div>
    <{include file="core/product-selections.tpl" arItems=$item.related title="������� ������"}>
<{/if}>
    <div class="clearfix">
        <div class="product-reviews" id="reviews">
            <div class="h1">������ � ������ <em><{$item.title}><{if !empty($item.pcode)}> <{$item.pcode}><{/if}></em></div>
            <{include file='ajax/comment-form.tpl' item=$item formData=array() errors=array() result=false ajax=false}>
            <button class="form-toggle btn btn-danger btn-l" onclick="Comments.toggleForm();">�������� �����</button>
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
    <{include file='core/banners.tpl' position=3 maxitems=1}>
    <div class="controlbar clearfix">
        <{include file="ajax/control_filter.tpl"}>
        <{include file="ajax/control_limit.tpl"}>
        <{include file="ajax/control_sort.tpl"}>
        <div class="selected-filters" id="selected_filters">
            <{include file='ajax/selected_filters.tpl'}>
        </div>
    </div>
    <div class="pull-right product-grid clearfix" id="products">
        <{include file='ajax/products.tpl' items=$items}>
    </div>
    <div class="pull-left column-left" id="filtersForm">
        <{include file='ajax/filter.tpl'}>
    </div>
<{* DISPLAY CATEGORY INFO *}>
<{else}>
    <{include file='core/static.tpl'}>
<{/if}>
</div>