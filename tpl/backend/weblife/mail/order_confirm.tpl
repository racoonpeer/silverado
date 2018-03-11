<!DOCTYPE html>
<html style='color:#212121; font-family:"OpenSans", Tahoma, Geneva, sans-serif; font-size:15px; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%' width="100%">
    <head>
        <title>Заказ №<{$arData.id}></title>
        <meta name="viewport" content="width=794"/>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    </head>
    <body style='color:#212121; font-family:"OpenSans", sans-serif; font-size:0.8125em; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%; position:relative' width="100%">
        <div class="page" style="margin:0 auto; padding:0; text-align:left; width:210mm" align="left" width="210mm">
            <div class="print-page" style="padding:3.5em 5em">
                <div class="print-head clearfix" style="padding-bottom:1.4cm">
                    <div class="print-logo" style="text-align: center;">
                        <a href="<{$smarty.const.WLCMS_HTTP_HOST}>" style="color:#09719C; text-decoration:none">
                            <img src="<{$smarty.const.WLCMS_HTTP_HOST}>/images/public/logo-top.png" alt="SILVERADO" title="SILVERADO"/>
                        </a>
                    </div>
                </div>
                <div class="print-order">
                    <h2 class="print-order-title" style="margin-bottom:1em; margin-top:0; font-size:2em; font-weight:400">Подтверждение заказа № <{$arData.id}></h2>
                    <p style="font-size: 1.5em;"><{if !empty($arData.firstname)}>Здравствуйте, <{$arData.firstname}>!<br/><{/if}>Ваш заказ подтвержден. Спасибо что выбрали нас!</p>
                    <div class="print-cart">
                        <table style="border-collapse:collapse; border-spacing:0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="2" style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="left" width="45%"> Название и цена товара </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="20%"> Артикул </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="15%"> Кол-во </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="right" width="20%"> Цена </td>
                            </tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
                            <tr>
                                <td width="17%" rowspan="2" align="left" valign="top" style="padding-top:1.25em; padding-bottom:1.25em; border-bottom:1px solid #b9b9b9;">
<{if !empty($arItem.image)}>
                                    <a href="<{$smarty.const.WLCMS_HTTP_HOST}><{$arItem.link}>" target="_blank" style="color:#09719C; text-decoration:none">
                                        <img src="<{$smarty.const.WLCMS_HTTP_HOST}><{$arItem.image.small_image}>" alt="<{$arItem.ptitle}>" title="<{$arItem.ptitle}>" style="max-width:2.65cm; border:none">
                                    </a>
<{/if}>
                                </td>
                                <td align="left" valign="top" colspan="4" style="font-size:1.25em; line-height:1.538em; padding-bottom:0.5em; padding-top:1.25em;">
                                    <a href="<{$smarty.const.WLCMS_HTTP_HOST}><{$arItem.link}>" target="_blank" style="color:#09719C; text-decoration:none"> <{$arItem.title}> <{$arItem.pcode}> </a>
<{foreach name=j from=$arItem.options key=optID item=option}>
<{foreach name=z from=$option.values key=valID item=value}>
<{if $value.selected}>
                                    <br/><span style="font-family:Verdana, Geneva, sans-serif; font-size:0.95em; color:#666;"><{$option.title}>: <{$value.title}></span>
<{/if}>
<{/foreach}>
<{/foreach}>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.price|number_format:0:'.':' '}> грн </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.pcode}> </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.qty}> шт. </td>
                                <td align="right" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"><b><{$arItem.amount|number_format:0:'.':' '}> грн</b></td>
                            </tr>
<{/foreach}>
                            <tr>
                                <td colspan="3" align="left" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.25em;"> Сумма к оплате </td>
                                <td colspan="2" align="right" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.5em;"><b><{$arData.price|number_format:0:'.':' '}> грн</b></td>
                            </tr>
                        </table>
                    </div>
<{if $arData.payment_id==Checkout::LP_PAYMENT_ID}>
                    <br/>
                    <br/>
                    <div style="max-width:240px;height:50px;line-height:50px;border-radius:2px;background-color:#7ab72b; margin: 0 auto;">
                        <a href="<{$arData.liqpay_url}>" style="font-weight:600;font-size: 1.5em;text-align:center;color:#ffffff;display:block;text-decoration:none;outline:none" target="_blank"> Оплатить заказ </a>
                    </div>
                    <br/>
                    <p style="text-align: center;">
                        <img src="<{$smarty.const.WLCMS_HTTP_HOST}>/images/public/mastercard.png" alt="MasterCard"/>&emsp;&emsp;
                        <img src="<{$smarty.const.WLCMS_HTTP_HOST}>/images/public/visa.png" alt="Visa"/>&emsp;&emsp;
                        <img src="<{$smarty.const.WLCMS_HTTP_HOST}>/images/public/privatbank.png" alt="PrivatBank"/>
                    </p>
<{/if}>
                </div>
                <div class="print-shedule" style="padding:1cm 0 0 0;">
                    <div class="print-shedule-phone" style="font-size:1.38em; letter-spacing:-0.025em; padding-bottom:0.1cm">
                        <nobr><b><a href="tel:+380973057697" style="color:inherit; text-decoration:none">097 305-76-97</a></b>,</nobr>&nbsp;
                        <nobr style="margin-left:6px"><a href="tel:+380956227572" style="color:inherit; text-decoration:none">095 622-75-72</a>,</nobr>&nbsp;
                        <nobr style="margin-left:6px"><a href="tel:+380638216588" style="color:inherit; text-decoration:none">063 821-65-88</a></nobr>
                    </div>
                    <div class="print-shedule-time" style="font-size:1em; letter-spacing:0.015em">с 8:00 до 20:00 <strong>без выходных</strong></div>
                </div>
            </div>
        </div>
    </body>
</html>