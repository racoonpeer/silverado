<div class="page-container clearfix">
    <div class="container clearfix">
        <h1 class="heading-title"><{$arrPageData.headingTitle}></h1>
        <div class="messages">
            <{$arrPageData.messages|implode:"<br/>"}>
        </div>
        <div class="order" id="order" data-order-info="Заказ №<{$item.id}> | <{$smarty.server.HTTP_HOST}>" data-date-info="<{$item.created|date_format:"%d.%m.%Y %H:%M"}>">
            <div class="h2 non-print">
                Ваш заказ
                <a href="#" class="print"></a>
            </div>
            <div class="basket-items">
<{foreach name=i from=$purchases item=arItem}>
                <div class="item clearfix">
                    <div class="pull-left image">
                        <a href="<{include file='core/href_item.tpl' arCategory=$arItem.arCategory arItem=$arItem}>">
                            <img src="<{$arItem.image.small_image}>" alt=""/>
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
                        <{$arItem.qty}> <small>шт.</small>
                        <strong><{$arItem.price|number_format:0:'.':' '}></strong>
                    </div>
                </div>
<{/foreach}>
            </div>
            <div class="summary">
                Сумма к оплате
                <strong class="pull-right">
                    <{$item.price|number_format:0:'.':' '}>
                </strong>
            </div>
            <div class="hr"></div>
            <div class="user-info">
                <div class="h3">Информация о заказе</div>
                <p>
<{if !empty($item.firstname)}>
                    Имя: <{$item.firstname|unScreenData}><{if !empty($item.surname)}> <{$item.surname|unScreenData}><{/if}><br/>
<{/if}>
                    Тел: <{$item.phone}>
<{if !empty($item.email)}>
                    <br/>
                    E-mail: <{$item.email}>
<{/if}>
                </p>
                <p>
<{if !empty($item.shipping)}>
                    Доставка: <{$item.shipping.title}>
<{/if}>
<{if !empty($item.city)}>
                    <br/>
                    Город: <{$item.city|unScreenData}>
<{/if}>
<{if !empty($item.address)}>
                    <br/>
                    Адрес: <{$item.address|unScreenData}>
<{/if}>
<{if !empty($item.ext_firstname) and !empty($item.ext_firstname)}>
                    <br/>
                    Получатель: <{$item.ext_firstname|unScreenData}><{if !empty($item.ext_surname)}> <{$item.ext_surname|unScreenData}><{/if}>
<{/if}>
<{if !empty($item.descr)}>
                    <br/>
                    Комментарий к заказу: <{$item.descr|unScreenData}>
<{/if}>
                </p>
                <p>
<{if !empty($item.payment)}>
                    Способ оплаты: <{$item.payment.title}><br/>
<{/if}>
                    Сумма к оплате: <{$item.price|number_format:0:'.':' '}> грн.
                </p>
            </div>
        </div>
    </div>
</div>