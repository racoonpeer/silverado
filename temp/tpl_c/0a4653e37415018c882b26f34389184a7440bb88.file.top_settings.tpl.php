<?php /* Smarty version Smarty-3.1.14, created on 2017-10-21 00:18:16
         compiled from "tpl/backend/weblife/common/top_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182305524059ea68180a0982-85748228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a4653e37415018c882b26f34389184a7440bb88' => 
    array (
      0 => 'tpl/backend/weblife/common/top_settings.tpl',
      1 => 1508266895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182305524059ea68180a0982-85748228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ea68180d4840_33567259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ea68180d4840_33567259')) {function content_59ea68180d4840_33567259($_smarty_tpl) {?><div class="top_settings">
    <a href="/admin.php?module=users"><?php echo @constant('ADMINISTRATORS');?>
</a>
    <a href="/admin.php?module=customers"><?php echo @constant('USERS');?>
</a>
    <a href="/admin.php?module=settings"><?php echo @constant('TOPLINK_SETTINGS');?>
</a>
    <a href="/admin.php?module=cms_settings">CMS settings</a>
</div><?php }} ?>