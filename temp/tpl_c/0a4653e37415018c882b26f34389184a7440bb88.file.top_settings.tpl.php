<?php /* Smarty version Smarty-3.1.14, created on 2017-11-11 10:50:08
         compiled from "tpl/backend/weblife/common/top_settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14391974645a06b9c0b1e848-01988751%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a4653e37415018c882b26f34389184a7440bb88' => 
    array (
      0 => 'tpl/backend/weblife/common/top_settings.tpl',
      1 => 1510389036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14391974645a06b9c0b1e848-01988751',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5a06b9c0b63e43_57748062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a06b9c0b63e43_57748062')) {function content_5a06b9c0b63e43_57748062($_smarty_tpl) {?><div class="top_settings">
    <a href="/admin/?module=users"><?php echo @constant('ADMINISTRATORS');?>
</a>
    <a href="/admin/?module=customers"><?php echo @constant('USERS');?>
</a>
    <a href="/admin/?module=settings"><?php echo @constant('TOPLINK_SETTINGS');?>
</a>
    <a href="/admin/?module=cms_settings">CMS settings</a>
</div><?php }} ?>