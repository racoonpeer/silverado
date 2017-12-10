<?php /* Smarty version Smarty-3.1.14, created on 2017-11-19 15:54:07
         compiled from "tpl/frontend/smart/mail/callback_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9066016575a118cff6810e6-87666672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8d533b55f75747a340730b31594aae1da30ebd8' => 
    array (
      0 => 'tpl/frontend/smart/mail/callback_admin.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9066016575a118cff6810e6-87666672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a118cff777823_97055105',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a118cff777823_97055105')) {function content_5a118cff777823_97055105($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Volumes/K2/htdocs/silverado/www/include/smarty/plugins/modifier.date_format.php';
?>Новый заказ обратного звонка
--------------------------------------------------------------------------------

Время: <?php echo smarty_modifier_date_format(time(),"%d.%m.%Y %H:%M");?>

Имя: <?php echo $_smarty_tpl->tpl_vars['arData']->value['firstname'];?>

Телефон: <?php echo $_smarty_tpl->tpl_vars['arData']->value['phone'];?>


--------------------------------------------------------------------------------
Сообщение сгенерировано автоматически.<?php }} ?>