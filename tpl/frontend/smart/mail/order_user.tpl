<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
        <title>����� �<{$arData.oid}></title>
    </head>
    <body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
        <table width="800px" border="0" cellpadding="0" cellspacing="0" style="margin: 0; font-family: Arial, Helvetica, sans-serif;">
            <tr>
                <td colspan="3">
                    <a href="<{$arData.server}>">
                        <img src="<{$arData.server}>/images/site/smart/logo.gif" style="border: 0px none;"/>
                    </a>
                    <br/>
                </td>
            </tr>	
            <tr>
                <td style="width: 35px;">&nbsp;</td>
                <td style="font-size: 14px; paddind-top: 25px; padding-bottom: 10px; font-family: Arial, sans-serif;">
                    ������������, <{$arData.firstname|cat:" "|cat:$arData.surname}>!
                </td>
                <td style="width: 35px;">&nbsp;</td>
            </tr>	
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 21px; padding-bottom: 15px;line-height: 1.1; font-family: Arial, sans-serif;">
                    ���� ������ �<{$arData.oid}> �������.<br/>
                    ��� ������������� ������ ��� �������� �������� � ����<br/>
                    � ��������� �����.
                </td>
                <td>&nbsp;</td>
            </tr>	
            <tr>
                <td height="3"></td>
                <td bgcolor="#454545" height="3"></td>
                <td height="3"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 14px; font-weight: bold; padding-top: 10px;">
                    ��� �����:
                </td>
                <td>&nbsp;</td>
            </tr>	
            <tr>
                <td>&nbsp;</td>
                <td>
                    <table border="0" cellpadding="10" cellspacing="0">
<{foreach name=i from=$arData.children key=arKey item=arItem}>
                        <tr>
<{if !empty($arItem.image)}>
                            <td width="150px" valign="top">
                                <a href="<{$arData.server|cat:$arItem.link}>">
                                    <img src="<{$arData.server}>/uploaded/catalog/<{$arItem.image}>" style="width: 150px; border: none;"/>
                                </a>
                            </td>
<{/if}>
                            <td valign="top" style="font-size: 14px; font-family: Arial, Helvetica, sans-serif;">
                                <a href="<{$arData.server|cat:$arItem.link}>"><{if !empty($arItem.arKits)}><{$arItem.set_title}><{else}><{$arItem.title}><{/if}></a>
<{if !empty($arItem.arKits)}>
                                <hr/>
                                <strong><{$arItem.title}></strong>
<{/if}>
<{foreach name=j from=$arItem.options key=optID item=option}>
                                <br/>
                                <{$option.title}>: 
<{foreach name=z from=$option.values key=valID item=value}>
                                <{$value.title}>
<{/foreach}>
<{/foreach}>
<{if !empty($arItem.arKits)}>
<{foreach name=k from=$arItem.arKits key=arKey item=kitItem}>
                                <hr/>
                                <strong><{$kitItem.title}></strong>
<{foreach name=j from=$kitItem.options key=optID item=option}>
                                <br/>
                                <{$option.title}>: 
<{foreach name=z from=$option.values key=valID item=value}>
                                <{$value.title}>
<{/foreach}>
<{/foreach}>     
<{/foreach}>
<{/if}>
                                <hr/>
                                <br/>
                                <b><{$arItem.price}> </b>���.<br/>
                                <b><{$arItem.quantity}> </b>��.
                            </td>
                        </tr>
<{/foreach}>
                    </table>
                </td>
                <td>&nbsp;</td>
            </tr>	
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 12px; padding-top: 25px; line-height: 1.4;">
                    ��������� ������: <{$arData.price-$arData.shipping.price}> ���.<br/>
                    ��������: <{$arData.shipping.price}> ���.
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding-bottom: 10px; font-weight: bold;">
                    ����� � ������: <{$arData.price}> ���.
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="3"></td>
                <td bgcolor="#454545" height="3"></td>
                <td height="3"></td>
            </tr>	
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 12px; padding: 13px 0; line-height: 1.6;">
                    E-mail: <{$arData.email}><br/>
                    ��������� �������: <{$arData.phone}><br/>
                    �����: <{$arData.city}><br/>
                    ����� ��������: <{$arData.address}><br/>
                    �������������� ����������: <{$arData.descr|unScreenData}><br/>
                    ������ ������: <{$arData.payment.title}><br/>
                    ������ ��������: <{$arData.shipping.title}>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </body>
</html>
<{*
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" type="text/html; charset=windows-1251" />
        <title>����� ����� �<{$arData.oid}></title>
    </head>
    <body>
        <h1>���������� � ������</h1>
        <table border="0" cellspacing="0" cellpadding="4">
            <tr valign="top">
                <td>
                    <strong>���� ��������:</strong>
                </td>
                <td>
                    <{$arData.created|date_format:"%d.%m.%Y %h:%m"}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>���:</strong>
                </td>
                <td>
                    <{$arData.firstname|cat:" "|cat:$arData.surname}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>�������:</strong>
                </td>
                <td>
                    <{$arData.phone}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>E-mail:</strong>
                </td>
                <td>
                    <{$arData.email}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>�����:</strong>
                </td>
                <td>
                    <{$arData.address}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>�����:</strong>
                </td>
                <td>
                    <{$arData.city}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>��������:</strong>
                </td>
                <td>
                    <{$arData.shipping.title}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>������:</strong>
                </td>
                <td>
                    <{$arData.payment.title}>
                </td>
            </tr>
            <tr valign="top">
                <td>
                    <strong>����������� � ������:</strong>
                </td>
                <td>
                    <{$arData.descr|unScreenData}>
                </td>
            </tr>
        </table>
        <br/>
                
        <h1>������</h1>
        <table border="1" cellspacing="0" cellpadding="4" style="border-color: #343434;">
            <tr>
                <th>������������</th>
                <th align="center">���-��</th>
                <th align="center">����</th>
            </tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
            <tr>
                <td><{$arItem.title}></td>
                <td align="center"><{$arItem.quantity}></td>
                <td align="center"><{$arItem.price}></td>
            </tr>
<{/foreach}>
            <tr>
                <td colspan="2" align="right">
                    <strong>��������� ��������:</strong>
                </td>
                <td align="center">
                    <strong><{$arData.shipping.price}></strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <strong>�����:</strong>
                </td>
                <td align="center">
                    <strong><{$arData.price}></strong>
                </td>
            </tr>
        </table>
    </body>
</html>
*}>