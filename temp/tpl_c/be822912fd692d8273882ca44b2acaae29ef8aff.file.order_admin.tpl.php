<?php /* Smarty version Smarty-3.1.14, created on 2017-11-19 18:02:12
         compiled from "tpl/frontend/smart/mail/order_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17147124295a0b42a9eab4f2-10800396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be822912fd692d8273882ca44b2acaae29ef8aff' => 
    array (
      0 => 'tpl/frontend/smart/mail/order_admin.tpl',
      1 => 1511107244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17147124295a0b42a9eab4f2-10800396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a0b42aa23f3f9_66808417',
  'variables' => 
  array (
    'arData' => 0,
    'arItem' => 0,
    'option' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b42aa23f3f9_66808417')) {function content_5a0b42aa23f3f9_66808417($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" type="text/html; charset=windows-1251"/>
        <title>Новый заказ №<?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
</title>
    </head>
    <body>
        <h1>Информация о заказе</h1>
        <h3>Номер заказа <?php echo $_smarty_tpl->tpl_vars['arData']->value['oid'];?>
</h3>
        <table border="0" cellspacing="0" cellpadding="4">
            <tr valign="top">
                <td>
                    <strong>Дата создания:</strong>
                </td>
                <td>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['arData']->value['created'],"%d.%m.%Y %H:%m");?>

                </td>
            </tr>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['firstname'])){?>
            <tr valign="top">
                <td>
                    <strong>ФИО:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['firstname'];?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['surname'])){?> <?php echo $_smarty_tpl->tpl_vars['arData']->value['surname'];?>
<?php }?>
                </td>
            </tr>
<?php }?>
            <tr valign="top">
                <td>
                    <strong>Телефон:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['phone'];?>

                </td>
            </tr>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['email'])){?>
            <tr valign="top">
                <td>
                    <strong>E-mail:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['email'];?>

                </td>
            </tr>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['address'])){?>
            <tr valign="top">
                <td>
                    <strong>Адрес:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['address'];?>

                </td>
            </tr>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['city'])){?>
            <tr valign="top">
                <td>
                    <strong>Город:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['city'];?>

                </td>
            </tr>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['shipping'])){?>
            <tr valign="top">
                <td>
                    <strong>Доставка:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['shipping']['title'];?>

                </td>
            </tr>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['payment'])){?>
            <tr valign="top">
                <td>
                    <strong>Оплата:</strong>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['arData']->value['payment']['title'];?>

                </td>
            </tr>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['arData']->value['descr'])){?>
            <tr valign="top">
                <td>
                    <strong>Комментарий к заказу:</strong>
                </td>
                <td>
                    <?php echo unScreenData($_smarty_tpl->tpl_vars['arData']->value['descr']);?>

                </td>
            </tr>
<?php }?>
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
<?php  $_smarty_tpl->tpl_vars['arItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['arItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arData']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['arItem']->key => $_smarty_tpl->tpl_vars['arItem']->value){
$_smarty_tpl->tpl_vars['arItem']->_loop = true;
?>
            <tr valign="middle">
                <td align="center">
                    <strong><?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
</strong>
                </td>
                <td align="left">
                    <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value,'params'=>''), 0);?>
">
                        <img src="<?php echo ($_smarty_tpl->tpl_vars['arData']->value['server']).($_smarty_tpl->tpl_vars['arItem']->value['image']['small_image']);?>
" alt=""/>
                    </a>
                </td>
                <td align="left">
                    <a href="<?php echo $_smarty_tpl->getSubTemplate ("core/href_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('arCategory'=>$_smarty_tpl->tpl_vars['arItem']->value['arCategory'],'arItem'=>$_smarty_tpl->tpl_vars['arItem']->value,'params'=>''), 0);?>
">
                        <strong><?php echo $_smarty_tpl->tpl_vars['arItem']->value['title'];?>
 <?php echo $_smarty_tpl->tpl_vars['arItem']->value['pcode'];?>
</strong>
                    </a>
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['optID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arItem']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['optID']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
                    <br/><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
: 
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['valID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['valID']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['selected']){?>
                        <?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>

<?php }?>
<?php } ?>
<?php } ?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['arItem']->value['qty'];?>
</td>
                <td align="center"><?php echo number_format($_smarty_tpl->tpl_vars['arItem']->value['price'],0,'.',' ');?>
</td>
            </tr>
<?php } ?>
            <tr>
                <td colspan="4" align="right">
                    <strong>Сумма к оплате:</strong>
                </td>
                <td align="center">
                    <strong><?php echo $_smarty_tpl->tpl_vars['arData']->value['price'];?>
</strong>
                </td>
            </tr>
        </table>
    </body>
</html><?php }} ?>