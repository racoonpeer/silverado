<!DOCTYPE html>
<html style='color:#212121; font-family:"OpenSans", Tahoma, Geneva, sans-serif; font-size:15px; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%' width="100%">
    <head>
        <title>����� �<{$arData.oid}></title>
        <meta name="viewport" content="width=794"/>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    </head>
    <body style='color:#212121; font-family:"OpenSans", sans-serif; font-size:0.8125em; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%; position:relative' width="100%">
        <div class="page" style="margin:0 auto; padding:0; text-align:left; width:210mm" align="left" width="210mm">
            <div class="print-page" style="padding:3.5em 5em">
                <div class="print-head clearfix" style="padding-bottom:1.4cm">
                    <div class="print-logo" style="text-align: center;">
                        <a href="<{$arData.server}>" style="color:#09719C; text-decoration:none">
                            <img src="<{$arData.server}>/images/public/logo-top.png" alt="Silverado" title="Silverado"/>
                        </a>
                    </div>
                </div>
                <div class="print-order">
                    <h2 class="print-order-title" style="margin-bottom:1em; margin-top:0; font-size:2em; font-weight:400">����� � <{$arData.oid}></h2>
                    <p style="font-size: 1.25em;"><{if isset($arData.firstname)}>������������, <{$arData.firstname}>!<br/><{/if}>
                        ��� ������������� ������ ��� �������� �������� � ����<br/>
                        � ��������� �����. </p>
                    <div class="print-cart">
                        <table style="border-collapse:collapse; border-spacing:0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="2" style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="left" width="45%"> �������� � ���� ������ </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="20%"> ������� </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="15%"> ���-�� </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="right" width="20%"> ���� </td>
                            </tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
                            <tr>
                                <td width="17%" rowspan="2" align="left" valign="top" style="padding-top:1.25em; padding-bottom:1.25em; border-bottom:1px solid #b9b9b9;">
                                    <a href="<{$arData.server}><{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>" target="_blank" style="color:#09719C; text-decoration:none">
                                        <img src="<{$arData.server}><{$arItem.image.small_image}>" alt="<{$arItem.title}> <{$arItem.pcode}>" title="<{$arItem.title}> <{$arItem.pcode}>" style="max-width:2.65cm; border:none">
                                    </a>
                                </td>
                                <td align="left" valign="top" colspan="4" style="font-size:1.25em; line-height:1.538em; padding-bottom:0.5em; padding-top:1.25em;">
                                    <a href="<{$arData.server}><{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>" target="_blank" style="color:#09719C; text-decoration:none"> <{$arItem.title}> <{$arItem.pcode}> </a>
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
                                <td align="left" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.price|number_format:0:'.':' '}> ��� </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.pcode}> </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <{$arItem.qty}> ��. </td>
                                <td align="right" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"><b><{$arItem.amount|number_format:0:'.':' '}> ���</b></td>
                            </tr>
<{/foreach}>
                            <tr>
                                <td colspan="3" align="left" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.25em;"> ����� � ������ </td>
                                <td colspan="2" align="right" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.5em;"><b><{$arData.price|number_format:0:'.':' '}> ���</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="print-info" style="padding-top:4em">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ���� � ����� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$smarty.now|date_format:"%d.%m.%Y %H:%M"}> </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
<{if isset($arData.firstname)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ��� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.firstname|unScreenData}><{if !empty($arData.surname)}> <{$arData.surname|unScreenData}><{/if}> </td>
                        </tr>
<{/if}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ������� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.phone}> </td>
                        </tr>
<{if isset($arData.email)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ��. ����� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.email}> </td>
                        </tr>
<{/if}>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
<{if isset($arData.shipping)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ������ �������� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.shipping.title}> </td>
                        </tr>
<{/if}>
<{if isset($arData.city)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ����� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.city|unScreenData}> </td>
                        </tr>
<{/if}>
<{if isset($arData.address)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ����� �������� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.address|unScreenData}> </td>
                        </tr>
<{/if}>
<{if isset($arData.ext_firstname) and !empty($arData.ext_firstname)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ����� �������� </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.ext_firstname|unScreenData}><{if !empty($arData.ext_surname)}> <{$arData.ext_surname|unScreenData}><{/if}> </td>
                        </tr>
<{/if}>
<{if isset($arData.payment)}>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ������ ������ </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> 
                                <{$arData.payment.title}> 
<{if $arData.payment.id==3}>
                                <br/>
                                <span style="font-size:0.81em;">��������! ����� ������������ ������ ����� ������ ������������� �� ��������</span>
<{/if}>
                            </td>
                        </tr>
<{/if}>
<{if isset($arData.descr)}>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;" align="left" valign="top" width="30%"> ����������� � ������ </td>
                            <td width="1.25em"></td>
                            <td style="padding-bottom:0.1cm;padding-top:0.1cm; font-size:1.15em;"> <{$arData.descr|unScreenData}> </td>
                        </tr>
<{/if}>
                    </table>
                </div>
                <div class="print-shedule" style="padding:1cm 0 0">
                    <div class="print-shedule-phone" style="font-size:1.38em; letter-spacing:-0.025em; padding-bottom:0.1cm">
                        <{*<nobr><b><a href="tel:+380973057697" style="color:inherit; text-decoration:none">097 305-76-97</a></b>,</nobr>&nbsp;
                        <nobr style="margin-left:6px"><a href="tel:+380956227572" style="color:inherit; text-decoration:none">095 622-75-72</a>,</nobr>&nbsp;
                        <nobr style="margin-left:6px"><a href="tel:+380638216588" style="color:inherit; text-decoration:none">063 821-65-88</a></nobr>*}>
                        <nobr style="margin-left:6px"><a href="tel:+380960549540" style="color:inherit; text-decoration:none">096 054-95-40</a></nobr>
                    </div>
                    <div class="print-shedule-time" style="font-size:1em; letter-spacing:0.015em">� 8:00 �� 20:00 <strong>��� ��������</strong></div>
                </div>
            </div>
        </div>
    </body>
</html>