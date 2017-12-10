<?php /* Smarty version Smarty-3.1.14, created on 2017-12-01 22:03:55
         compiled from "tpl/frontend/smart/mail/order_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10449287995a0b42aa3775d9-36381146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f444ae4628f5ab4340ae2a97703dc394c22d4b' => 
    array (
      0 => 'tpl/frontend/smart/mail/order_user.tpl',
      1 => 1512158556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10449287995a0b42aa3775d9-36381146',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b42aa63db82_32677450',
  'variables' => 
  array (
    'arData' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b42aa63db82_32677450')) {function content_5a0b42aa63db82_32677450($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <title>Заказ №<?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
 - Silverado</title>
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
                    <a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
">
                    	<img alt="Silverado" src="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
/images/public/logo-top.png"/>
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
                            	<p style="font-size:24px; font-family:Verdana, Geneva, sans-serif;">Спасибо! Отличный выбор<br/>
                                    <span style="font-size:16px; font-family:Verdana, Geneva, sans-serif;">Номер вашего заказа <span style="font-size:20px"><?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
</span>. В ближайшее время наш менеджер свяжется с вами для уточнения деталей заказа</span>
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
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_smarty_tpl->tpl_vars['arKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arData']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
 $_smarty_tpl->tpl_vars['arKey']->value = $_smarty_tpl->tpl_vars['arItem']->key;
?>
                            <td align="center" valign="top" style="text-align:center;">
                            	<a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value,'params'=>''), 0);?>
">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->tpl_vars['arItem']->value['image']['small_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
"/>
                                </a>
                                <br/>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value,'params'=>''), 0);?>
" style="font-family:Verdana, Geneva, sans-serif; color:#262626; text-decoration:none; font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
</a><br/>
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
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#666;"><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
: <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</span><br/>
<?php }?>
<?php } ?>
<?php } ?>
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size:18px;">
                                    <?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>
 <small>грн</small> 
<?php if ($_smarty_tpl->tpl_vars['arItem']->value['qty']>1){?>
                                    (<?php echo $_smarty_tpl->tpl_vars['arItem']->value['qty'];?>
 <small>шт</small>)
<?php }?>
                                </span>
                                
                            </td>
<?php } ?>
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
                            	<p style="font-size:18px; font-family:Verdana, Geneva, sans-serif;">Сумма к оплате <span style="font-size:20px;"><?php echo number_format($_smarty_tpl->tpl_vars['arData']->value['price'],0,'.',' ');?>
</span> грн</p>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['payment'])){?>
                                <p style="font-family:Verdana, Geneva, sans-serif; font-size:14px;">Способ оплаты <strong><?php echo $_smarty_tpl->tpl_vars['arData']->value['payment']['title'];?>
</strong>
<?php if ($_smarty_tpl->tpl_vars['arData']->value['payment']['id']==3){?>
                                <br/>
                                <span style="font-size:10px;">Внимание!<br/>
Заказ оплачивается только после подтверждения по телефону.<br/>
Ознакомьтесь с условиями <a href="#" style="color:#000; text-decoration:underline;">доставки и оплаты</a> заказа</span>
<?php }?>
                                </p>
<?php }?>
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
                            	<p style="font-size:10px; font-family:Verdana, Geneva, sans-serif;">Пожалуйста, проверьте правильность указанных данных</p>
                            	<p style="font-size:14px; font-family:Verdana, Geneva, sans-serif;">
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['firstname'])){?>
                                Имя: <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['firstname']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['arData']->value['surname'])){?> <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['surname']);?>
<?php }?><br/>
<?php }?>
                                Тел: <?php echo $_smarty_tpl->tpl_vars['arData']->value['phone'];?>

<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['email'])){?>
                                <br/>
                                E-mail: <?php echo $_smarty_tpl->tpl_vars['arData']->value['email'];?>

<?php }?>
                                </p>
                                <p style="font-size:14px; font-family:Verdana, Geneva, sans-serif;">
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['shipping'])){?>
                                Доставка: <?php echo $_smarty_tpl->tpl_vars['arData']->value['shipping']['title'];?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['city'])){?>
                                <br/>
                                Город: <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['city']);?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['address'])){?>
                                <br/>
                                Адрес: <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['address']);?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['ext_firstname'])&&!empty($_smarty_tpl->tpl_vars['arData']->value['ext_firstname'])){?>
                                <br/>
                                Получатель: <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['ext_firstname']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['arData']->value['ext_surname'])){?> <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['ext_surname']);?>
<?php }?>
<?php }?>
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
                            	<a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">099 0549540</a> <img src="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
/images/public/viber-sm.png" alt="" valign="top"/><br/>
                                <a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">096 0549540</a><br/>
                                <a href="#" style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#000; text-decoration:none;">093 0549540</a><br/>
                                <span style="font-family:Verdana, Geneva, sans-serif; font-size: 12px;">с 8:00 до 20:00. Без выходных</span>
                            </td>
                            <td width="300" valign="top" style="font-family:Verdana, Geneva, sans-serif; font-size: 12px;">
                            	<h3 style="font-family:Verdana, Geneva, sans-serif; font-weight:400; margin-top: 0; margin-bottom:0.5em;">Покупателю</h3>
                            	<a href="#" style="color:#06C;">Гарантия качества продукции</a><br/>
                            	<a href="#" style="color:#06C;">Условия возврата и обмена товара</a><br/>
                            	<a href="#" style="color:#06C;">Доставка и оплата заказа</a>
                            </td>
                            <td valign="bottom" align="right" style="text-align:right">
                            	<a href="<?php echo $_smarty_tpl->tpl_vars['arData']->value['server'];?>
" style="font-size:12px; color:#06C;">silverado.com.ua</a>&emsp;&emsp;&emsp;
                            	<span style="font-family:'Courier New', Courier, monospace; font-size:10px; color:#999;"><?php echo smarty_modifier_date_format(time(),"%d.%m.%Y %H:%M");?>
</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php }} ?>