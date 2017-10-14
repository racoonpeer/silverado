<?php /* Smarty version Smarty-3.1.14, created on 2017-10-08 19:17:52
         compiled from "tpl/backend/weblife/common/top_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1832721959ac6ce62f8ec5-72287384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a4653e37415018c882b26f34389184a7440bb88' => 
    array (
      0 => 'tpl/backend/weblife/common/top_settings.tpl',
      1 => 1507479413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1832721959ac6ce62f8ec5-72287384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_59ac6ce633cbd3_04760234',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ac6ce633cbd3_04760234')) {function content_59ac6ce633cbd3_04760234($_smarty_tpl) {?><div class="top_settings">
    <a href="/admin.php?module=users"><?php echo @constant('ADMINISTRATORS');?>
</a>
    <a href="/admin.php?module=customers"><?php echo @constant('USERS');?>
</a>
    <a href="/admin.php?module=settings"><?php echo @constant('TOPLINK_SETTINGS');?>
</a>
    <a href="/admin.php?module=cms_settings">CMS settings</a>
</div><?php }} ?>