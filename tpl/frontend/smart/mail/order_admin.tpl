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
                <th>ID</th>
                <th>������������</th>
                <th align="center">���-��</th>
                <th align="center">����</th>
            </tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
            <tr valign="top">
                <td><{$arItem.id}></td>
                <td>
                    <strong><{if !empty($arItem.arKits)}><{$arItem.set_title}><{else}><{$arItem.title}><{/if}></strong>
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
                </td>
                <td align="center"><{$arItem.quantity}></td>
                <td align="center"><{$arItem.price}></td>
            </tr>
<{/foreach}>
            <tr>
                <td colspan="3" align="right">
                    <strong>��������� ��������:</strong>
                </td>
                <td align="center">
                    <strong><{$arData.shipping.price}></strong>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <strong>�����:</strong>
                </td>
                <td align="center">
                    <strong><{$arData.price}></strong>
                </td>
            </tr>
        </table>
    </body>
</html>