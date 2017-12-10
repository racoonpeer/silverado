<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" type="text/html; charset=windows-1251"/>
        <title>Новый заказ №<{$arData.oid}></title>
    </head>
    <body>
        <h1>Информация о заказе</h1>
        <h3>Номер заказа <{$arData.oid}></h3>
        <table border="0" cellspacing="0" cellpadding="4">
            <tr valign="top">
                <td>
                    <strong>Дата создания:</strong>
                </td>
                <td>
                    <{$arData.created|date_format:"%d.%m.%Y %H:%m"}>
                </td>
            </tr>
<{if isset($arData.firstname)}>
            <tr valign="top">
                <td>
                    <strong>ФИО:</strong>
                </td>
                <td>
                    <{$arData.firstname}><{if isset($arData.surname)}> <{$arData.surname}><{/if}>
                </td>
            </tr>
<{/if}>
            <tr valign="top">
                <td>
                    <strong>Телефон:</strong>
                </td>
                <td>
                    <{$arData.phone}>
                </td>
            </tr>
<{if isset($arData.email)}>
            <tr valign="top">
                <td>
                    <strong>E-mail:</strong>
                </td>
                <td>
                    <{$arData.email}>
                </td>
            </tr>
<{/if}>
<{if isset($arData.address)}>
            <tr valign="top">
                <td>
                    <strong>Адрес:</strong>
                </td>
                <td>
                    <{$arData.address}>
                </td>
            </tr>
<{/if}>
<{if isset($arData.city)}>
            <tr valign="top">
                <td>
                    <strong>Город:</strong>
                </td>
                <td>
                    <{$arData.city}>
                </td>
            </tr>
<{/if}>
<{if isset($arData.shipping)}>
            <tr valign="top">
                <td>
                    <strong>Доставка:</strong>
                </td>
                <td>
                    <{$arData.shipping.title}>
                </td>
            </tr>
<{/if}>
<{if isset($arData.payment)}>
            <tr valign="top">
                <td>
                    <strong>Оплата:</strong>
                </td>
                <td>
                    <{$arData.payment.title}>
                </td>
            </tr>
<{/if}>
<{if isset($arData.descr)}>
            <tr valign="top">
                <td>
                    <strong>Комментарий к заказу:</strong>
                </td>
                <td>
                    <{$arData.descr|unScreenData}>
                </td>
            </tr>
<{/if}>
        </table>
        <br/>
        <h2>Товары</h2>
        <table border="1" cellspacing="0" cellpadding="4" style="border-color: #343434;">
            <tr>
                <th width="90" align="center">Арт.</th>
                <th width="140" align="left"></th>
                <th align="left">Наименование</th>
                <th width="80" align="center">Кол-во</th>
                <th width="120" align="center">Цена</th>
            </tr>
<{foreach name=i from=$arData.children item=arItem}>
            <tr valign="middle">
                <td align="center">
                    <strong><{$arItem.pcode}></strong>
                </td>
                <td align="left">
                    <a href="<{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>">
                        <img src="<{$arData.server|cat:$arItem.image.small_image}>" alt=""/>
                    </a>
                </td>
                <td align="left">
                    <a href="<{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>">
                        <strong><{$arItem.title}> <{$arItem.pcode}></strong>
                    </a>
<{foreach name=j from=$arItem.options key=optID item=option}>
                    <br/><{$option.title}>: 
<{foreach name=z from=$option.values key=valID item=value}>
<{if $value.selected}>
                        <{$value.title}>
<{/if}>
<{/foreach}>
<{/foreach}>
                </td>
                <td align="center"><{$arItem.qty}></td>
                <td align="center"><{$arItem.price|number_format:0:'.':' '}></td>
            </tr>
<{/foreach}>
            <tr>
                <td colspan="4" align="right">
                    <strong>Сумма к оплате:</strong>
                </td>
                <td align="center">
                    <strong><{$arData.price}></strong>
                </td>
            </tr>
        </table>
    </body>
</html>