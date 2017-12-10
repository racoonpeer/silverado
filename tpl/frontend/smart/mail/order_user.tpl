<!DOCTYPE html>
<html>
    <head>
        <title>����� �<{$arData.oid}> - Silverado</title>
        <meta charset="windows-1251">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="font-family: sans-serif; margin: 0; padding: 0;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
            	<td bgcolor="#262626" height="5" style="height:5px; background-color:#262626;"></td>
            </tr>
            <tr>
            	<td height="40" style="height:40px;"></td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="text-align:center;">
                    <a href="<{$arData.server}>">
                    	<img alt="Silverado" src="<{$arData.server}>/images/public/logo-top.png"/>
                    </a>
                </td>
            </tr>
            <tr>
            	<td height="32px;" style="height:32px;"></td>
            </tr>
            <tr>
            	<td height="1" bgcolor="#e7e7e7" style="height:1px; background-color:#e7e7e7;"></td>
            </tr>
            <tr>
            	<td height="10px;" style="height:10px;"></td>
            </tr>
            <tr>
            	<td>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    	<tr>
                            <td width="20"></td>
                            <td>
                            	<p style="font-size:24px; font-family:Verdana, Geneva, sans-serif;">�������! �������� �����<br/>
                                    <span style="font-size:16px; font-family:Verdana, Geneva, sans-serif;">����� ������ ������ <span style="font-size:20px"><{$arData.oid}></span>. � ��������� ����� ��� �������� �������� � ���� ��� ��������� ������� ������</span>
                                </p>
                            </td>
                            <td width="20"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                    <table cellpadding="10" cellspacing="10" border="0">
                    	<tr>
<{foreach name=i from=$arData.children key=arKey item=arItem}>
                            <td align="center" valign="top" style="text-align:center;">
                            	<a href="<{$arData.server}><{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>">
                                    <img src="<{$arData.server}><{$arItem.image.small_image}>" alt="<{$arItem.title}>"/>
                                </a>
                                <br/>
                                <a href="<{$arData.server}><{include file="core/href_item.tpl" arCategory=$arItem.arCategory arItem=$arItem params=""}>" style="font-family:Verdana, Geneva, sans-serif; color:#262626; text-decoration:none; font-size:14px;"><{$arItem.title}> <{$arItem.pcode}></a><br/>
<{foreach name=j from=$arItem.options key=optID item=option}>
<{foreach name=z from=$option.values key=valID item=value}>
<{if $value.selected}>
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#666;"><{$option.title}>: <{$value.title}></span><br/>
<{/if}>
<{/foreach}>
<{/foreach}>
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size:18px;">
                                    <{$arItem.price|number_format:0:'.':' '}> <small>���</small> 
<{if $arItem.qty > 1}>
                                    (<{$arItem.qty}> <small>��</small>)
<{/if}>
                                </span>
                                
                            </td>
<{/foreach}>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="32px;" style="height:32px;"></td>
            </tr>
            <tr>
            	<td height="1" bgcolor="#e7e7e7" style="height:1px; background-color:#e7e7e7;"></td>
            </tr>
            <tr>
            	<td>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    	<tr>
                            <td width="20"></td>
                            <td>
                            	<p style="font-size:18px; font-family:Verdana, Geneva, sans-serif;">����� � ������ <span style="font-size:20px;"><{$arData.price|number_format:0:'.':' '}></span> ���</p>
<{if isset($arData.payment)}>
                                <p style="font-family:Verdana, Geneva, sans-serif; font-size:14px;">������ ������ <strong><{$arData.payment.title}></strong>
<{if $arData.payment.id==3}>
                                <br/>
                                <span style="font-size:10px;">��������!<br/>
����� ������������ ������ ����� ������������� �� ��������.<br/>
������������ � ��������� <a href="#" style="color:#000; text-decoration:underline;">�������� � ������</a> ������</span>
<{/if}>
                                </p>
<{/if}>
                            </td>
                        	<td width="20"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="2" bgcolor="#262626" style="height:2px; background-color:#262626;"></td>
            </tr>
            <tr>
            	<td>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    	<tr>
                            <td width="20"></td>
                            <td>
                            	<p style="font-size:10px; font-family:Verdana, Geneva, sans-serif;">����������, ��������� ������������ ��������� ������</p>
                            	<p style="font-size:14px; font-family:Verdana, Geneva, sans-serif;">
<{if isset($arData.firstname)}>
                                ���: <{$arData.firstname|unScreenData}><{if !empty($arData.surname)}> <{$arData.surname|unScreenData}><{/if}><br/>
<{/if}>
                                ���: <{$arData.phone}>
<{if isset($arData.email)}>
                                <br/>
                                E-mail: <{$arData.email}>
<{/if}>
                                </p>
                                <p style="font-size:14px; font-family:Verdana, Geneva, sans-serif;">
<{if isset($arData.shipping)}>
                                ��������: <{$arData.shipping.title}>
<{/if}>
<{if isset($arData.city)}>
                                <br/>
                                �����: <{$arData.city|unScreenData}>
<{/if}>
<{if isset($arData.address)}>
                                <br/>
                                �����: <{$arData.address|unScreenData}>
<{/if}>
<{if isset($arData.ext_firstname) and !empty($arData.ext_firstname)}>
                                <br/>
                                ����������: <{$arData.ext_firstname|unScreenData}><{if !empty($arData.ext_surname)}> <{$arData.ext_surname|unScreenData}><{/if}>
<{/if}>
                                </p>
                            </td>
                            <td width="20"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td height="20" style="height:20px;"></td>
            </tr>
            <tr>
            	<td bgcolor="#ededed" style="background-color:#ededed;">
                    <table cellpadding="10" cellspacing="10" border="0" width="100%">
                    	<tr>
                            <td width="200" style="width:200px;">
                            	<a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">099 0549540</a> <img src="<{$arData.server}>/images/public/viber-sm.png" alt="" valign="top"/><br/>
                                <a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">096 0549540</a><br/>
                                <a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">093 0549540</a><br/>
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size: 12px;">� 8:00 �� 20:00. ��� ��������</span>
                            </td>
                            <td width="300" valign="top" style="font-family:Verdana, Geneva, sans-serif; font-size: 12px;">
                            	<h3 style="font-family:Verdana, Geneva, sans-serif; font-weight:400; margin-top: 0; margin-bottom:0.5em;">����������</h3>
                            	<a href="#" style="color:#06C;">�������� �������� ���������</a><br/>
                            	<a href="#" style="color:#06C;">������� �������� � ������ ������</a><br/>
                            	<a href="#" style="color:#06C;">�������� � ������ ������</a>
                            </td>
                            <td valign="bottom" align="right" style="text-align:right">
                            	<a href="<{$arData.server}>" style="font-size:12px; color:#06C;">silverado.com.ua</a>&emsp;&emsp;&emsp;
                            	<span style="font-family:'Courier New', Courier, monospace; font-size:10px; color:#999;"><{$smarty.now|date_format:"%d.%m.%Y %H:%M"}></span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
<{*







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
                        <img src="<{$arData.server}>/images/public/logo.gif" style="border: 0px none;"/>
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
                                    <img src="<{$arData.server}>/uploads/catalog/<{$arItem.image}>" style="width: 150px; border: none;"/>
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