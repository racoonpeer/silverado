<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" type="text/html; charset=windows-1251" />
        <title>����� ����� �<{$arData.oid}></title>
    </head>
    <body>
        <h1>���������� � ������</h1>
        <table border="0" cellspacing="0" cellpadding="4" class="list">
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
        <table border="1" cellspacing="0" cellpadding="4" style="border-color: #343434;" class="list">
            <tr>
                <th>ID</th>
                <th>������������</th>
                <th align="center">���-��</th>
                <th align="center">����</th>
            </tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
            <tr>
                <td><{$arItem.id}></td>
                <td><{$arItem.title}></td>
                <td align="center"><{$arItem.qty}></td>
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