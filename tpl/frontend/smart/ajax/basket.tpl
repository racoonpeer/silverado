<{if !$Basket->isEmptyBasket()}>
<div class="full">
    <div class="heading">
        �������
        <br/>
        <small>����� <{$Basket->getTotalAmount()}> <{$HTMLHelper->getNumEnding($Basket->getTotalAmount(), array("�����", "������", "�������"))}> �� ����� <{$Basket->getTotalPrice()|number_format:0:'.':' '}> ���.</small>
    </div>
    <div class="basket-items">
<{foreach name=i from=$Basket->getItems() key=arKey item=arItem}>
        <div class="item clearfix">
            <div class="pull-left image">
                <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>">
                    <img src="<{$arItem.middle_image}>" alt=""/>
                </a>
            </div>
            <div class="title">
                <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>"><{$arItem.title}> <{$arItem.pcode}></a>
            </div>
<{if !empty($arItem.options)}>
            <div class="options">
<{foreach name=j from=$arItem.options key=optionID item=option}>
<{foreach name=z from=$option.values key=valueID item=value}>
<{if $value.selected}>
                <{$option.title}>: <{$value.title}><{if !$smarty.foreach.j.last}>, <{/if}>
<{/if}>
<{/foreach}>
<{/foreach}>
            </div>
<{/if}>
            <div class="price">
                <strong><{$arItem.price|number_format:0:'.':' '}></strong>
            </div>
            <div class="calc qty">
                <button class="minus" onclick="Basket.add('<{$arKey}>', <{$arItem.quantity-1}>, 1);" <{if $arItem.quantity==1}>disabled<{/if}>></button>
                <input type="text" value="<{$arItem.quantity}>" readonly=""/>
                <button class="plus" onclick="Basket.add('<{$arKey}>', <{$arItem.quantity+1}>, 1);"></button>
            </div>
            <a class="del" href="#" onclick="Basket.remove('<{$arKey}>');"></a>
        </div>
<{/foreach}>
    </div>
    <div class="summary clearfix">
        ����� � ������
        <strong class="pull-right"><{$Basket->getTotalPrice()|number_format:0:'.':' '}></strong>
    </div>
    <div class="buttons clearfix">
        <a href="<{include file="core/href.tpl" arCategory=$arrModules.checkout}>" class="btn btn-xl btn-danger btn-block">�������� �����</a><br/>
        <a href="#" onclick="Basket.close();" class="btn btn-l btn-link btn-block">���������� �������</a>
    </div>
</div>
<{else}>
<div class="empty">
    <div class="message">
        ������� �����
        <p>�� ��� ����� ��������� :)</p>
    </div>
    <div class="last-watched">
        <div class="h3">�� ������� ��������</div>
        <div class="watched-slider swiper-container">
            <div class="swiper-wrapper">
<{foreach from=$HTMLHelper->getLastWatched($UrlWL) item=arItem}>
                <div class="watched-item swiper-slide">
                    <div class="img">
                        <a href="<{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>">
                            <img src="<{$arItem.image.small_image}>" alt=""/>
                        </a>
                    </div>
                    <div class="title">
                        <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>"><{$arItem.name}></a>
                    </div>
                    <div class="category">
                        <a href="<{include file='core/href.tpl' arCategory=$arItem.arCategory}>"><{$arItem.arCategory.title}></a>
                    </div>
                    <{include file="core/product_price.tpl" item=$arItem}>
                </div>
<{/foreach}>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <div class="buttons clearfix">
        <a href="#" onclick="Basket.close();" class="btn btn-xl btn-link btn-block">���������� �������</a>
    </div>
</div>
<{/if}>
<button class="close" onclick="Basket.close();"></button>