<?php /* Smarty version Smarty-3.1.14, created on 2018-01-28 17:48:08
         compiled from "tpl/backend/weblife/mail/order_confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4964817815a64ffba3e8d38-80751636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e8985d0d642ddc6a9f3647e9c86b3ec084df33d' => 
    array (
      0 => 'tpl/backend/weblife/mail/order_confirm.tpl',
      1 => 1517152478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4964817815a64ffba3e8d38-80751636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a64ffba65c5f9_33295075',
  'variables' => 
  array (
    'arData' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a64ffba65c5f9_33295075')) {function content_5a64ffba65c5f9_33295075($_smarty_tpl) {?><!DOCTYPE html>
<html style='color:#212121; font-family:"OpenSans", Tahoma, Geneva, sans-serif; font-size:15px; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%' width="100%">
    <head>
        <title>Заказ №<?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
</title>
        <meta name="viewport" content="width=794"/>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
    </head>
    <body style='color:#212121; font-family:"OpenSans", sans-serif; font-size:0.8125em; margin:0; min-width:794px; padding:0; scroll-behavior:smooth; width:100%; position:relative' width="100%">
        <div class="page" style="margin:0 auto; padding:0; text-align:left; width:210mm" align="left" width="210mm">
            <div class="print-page" style="padding:3.5em 5em">
                <div class="print-head clearfix" style="padding-bottom:1.4cm">
                    <div class="print-logo" style="text-align: center;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
" style="color:#09719C; text-decoration:none">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
/images/public/logo-top.png" alt="Silverado" title="Silverado"/>
                        </a>
                    </div>
                </div>
                <div class="print-order">
                    <h2 class="print-order-title" style="margin-bottom:1em; margin-top:0; font-size:2em; font-weight:400">Подтверждение заказа № <?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
!</h2>
                    <p style="font-size: 1.5em;"><?php if (!empty($_smarty_tpl->tpl_vars['arData']->value['firstname'])){?>Здравствуйте, <?php echo $_smarty_tpl->tpl_vars['arData']->value['firstname'];?>
!<br/><?php }?>
                        Ваш заказ подтвержден. Спасибо что выбрали нас!</p>
                    <div class="print-cart">
                        <table style="border-collapse:collapse; border-spacing:0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td colspan="2" style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="left" width="45%"> Название и цена товара </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="20%"> Артикул </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="center" width="15%"> Кол-во </td>
                                <td style="font-size:1.15em; padding: 0.3em 0.2em; border-bottom:1px solid #b9b9b9;" align="right" width="20%"> Цена </td>
                            </tr>
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arData']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
                            <tr>
                                <td width="17%" rowspan="2" align="left" valign="top" style="padding-top:1.25em; padding-bottom:1.25em; border-bottom:1px solid #b9b9b9;">
<?php if (!empty($_smarty_tpl->tpl_vars['arItem']->value['image'])){?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->tpl_vars['arItem']->value['link'];?>
" target="_blank" style="color:#09719C; text-decoration:none">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->tpl_vars['arItem']->value['image']['small_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['ptitle'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['ptitle'];?>
" style="max-width:2.65cm; border:none">
                                    </a>
<?php }?>
                                </td>
                                <td align="left" valign="top" colspan="4" style="font-size:1.25em; line-height:1.538em; padding-bottom:0.5em; padding-top:1.25em;">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->tpl_vars['arItem']->value['link'];?>
" target="_blank" style="color:#09719C; text-decoration:none"> <?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
 </a>
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arItem']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>
                                    <br/><span style="font-family:Verdana, Geneva, sans-serif; font-size:0.95em; color:#666;"><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</span>
<?php }?>
<?php } ?>
<?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>
 грн </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
 </td>
                                <td align="center" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"> <?php echo $_smarty_tpl->tpl_vars['arItem']->value['qty'];?>
 шт. </td>
                                <td align="right" valign="top" style="font-size:1.15em;padding-bottom:1em; border-bottom:1px solid #b9b9b9;"><b><?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['amount'],0,'.',' ');?>
 грн</b></td>
                            </tr>
<?php } ?>
                            <tr>
                                <td colspan="3" align="left" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.25em;"> Сумма к оплате </td>
                                <td colspan="2" align="right" style="padding-top:1em; border-top:1px solid #b9b9b9; font-size:1.5em;"><b><?php echo number_format($_smarty_tpl->tpl_vars['arData']->value['price'],0,'.',' ');?>
 грн</b></td>
                            </tr>
                        </table>
                    </div>
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
</html><?php }} ?>